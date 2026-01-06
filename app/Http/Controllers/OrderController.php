<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Controllers\CartController;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validate Input
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
            'phone' => 'required',
        ]);

        try {
            // 2. Get Cart Data
        // Ideally we reuse CartController logic, but for now we'll fetch manually to be safe or call the helper
        // 2. Get Cart Data
        $cart = [];
        if(Auth::check()) {
            $items = \App\Models\Cart::where('user_id', Auth::id())->with(['product', 'bundle'])->get();
            foreach($items as $item) {
                 if($item->product_id && $item->product) {
                    $cart[$item->product_id . '-' . $item->size] = [
                        "name" => $item->product->title,
                        "quantity" => $item->quantity,
                        "price" => $item->product->starting_price,
                        "image" => $item->product->main_image_url,
                        "product_id" => $item->product_id,
                        "bundle_id" => null,
                        "size" => $item->size,
                        "type" => "product"
                    ];
                } elseif ($item->bundle_id && $item->bundle) {
                    $cart['bundle-' . $item->bundle_id] = [
                        "name" => $item->bundle->title,
                        "quantity" => $item->quantity,
                        "price" => $item->bundle->total_price,
                        "image" => \Illuminate\Support\Facades\Storage::url($item->bundle->image),
                        "product_id" => null,
                        "bundle_id" => $item->bundle_id,
                        "size" => null,
                        "type" => "bundle"
                    ];
                }
            }
        } else {
            $cart = session()->get('cart', []);
        }

        if(empty($cart)) {
            return response()->json(['success' => false, 'message' => 'Your cart is empty'], 400);
        }

        // 3. Calculate Totals
        $subtotal = 0;
        foreach($cart as $id => $details) {
            $subtotal += $details['price'] * $details['quantity'];
        }
        $shipping = 0; // Free shipping
        $total = $subtotal + $shipping;

        // 4. Create Order
        $order = Order::create([
            'user_id' => Auth::id(),
            'order_number' => 'NR-' . strtoupper(Str::random(8)),
            'status' => 'pending',
            'payment_method' => 'cod', // Hardcoded as per requirement
            'payment_status' => 'pending',
            'subtotal' => $subtotal,
            'shipping_cost' => $shipping,
            'total_amount' => $total,
            'customer_name' => $request->first_name . ' ' . $request->last_name,
            'customer_email' => $request->email,
            'customer_phone' => $request->phone,
            'shipping_address' => [
                'address' => $request->address,
                'apartment' => $request->apartment,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
            ],
            'notes' => $request->notes,
            'placed_at' => now(),
        ]);

        // 4.1 Save User Address if not exists
        if(Auth::check()) {
            $hasAddress = \App\Models\UserAddress::where('user_id', Auth::id())->exists();
            if(!$hasAddress) {
                \App\Models\UserAddress::create([
                    'user_id' => Auth::id(),
                    'address_line1' => $request->address,
                    'address_line2' => $request->apartment,
                    'city' => $request->city,
                    'state' => $request->state,
                    'zip' => $request->zip,
                    'country' => 'India',
                    'is_default' => true,
                ]);
            }
        }

        // 5. Create Order Items & Update Stock
        foreach($cart as $key => $details) {
            // Create Order Item
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $details['product_id'] ?? null,
                'bundle_id' => $details['bundle_id'] ?? null,
                'name' => $details['name'],
                'quantity' => $details['quantity'],
                'price' => $details['price'],
                'total' => $details['price'] * $details['quantity'],
                'size' => $details['size'] ?? null,
                'type' => $details['type'] ?? 'product',
            ]);

            // Update Stock
            if (($details['type'] ?? 'product') == 'product' && !empty($details['product_id'])) {
                // Decrement Product Variant Stock
                if (!empty($details['size'])) {
                    \App\Models\ProductVariant::where('product_id', $details['product_id'])
                        ->where('size', $details['size'])
                        ->decrement('stock', $details['quantity']);
                } else {
                    // Fallback: Decrement the first variant or specific logic if size is null
                    // Assuming products always have variants in this system
                    $variant = \App\Models\ProductVariant::where('product_id', $details['product_id'])->first();
                    if ($variant) {
                        $variant->decrement('stock', $details['quantity']);
                    }
                }
            } elseif (($details['type'] ?? 'product') == 'bundle' && !empty($details['bundle_id'])) {
                // Decrement Stock for each product in the bundle
                $bundle = \App\Models\Bundle::with('products.variants')->find($details['bundle_id']);
                if ($bundle) {
                    // Increment Total Sales for Bundle
                    $bundle->increment('total_sales', $details['quantity']);

                    foreach ($bundle->products as $bProduct) {
                        $qtyInBundle = $bProduct->pivot->quantity ?? 1;
                        $totalQtyToDeduct = $details['quantity'] * $qtyInBundle;

                        // Identify which variant to deduct only if we can determining it. 
                        // For bundles, typically it's the standard size or defined in pivot? 
                        // Current system seems to assume flexible or first variant. 
                        // specific logic: Deduct from the first variant (base variant)
                        if ($bProduct->variants->isNotEmpty()) {
                            $bProduct->variants->first()->decrement('stock', $totalQtyToDeduct);
                        }
                    }
                }
            }
        }

        // 6. Clear Cart
        if(Auth::check()) {
            \App\Models\Cart::where('user_id', Auth::id())->delete();
        }
        session()->forget('cart');

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage() . ' | Line: ' . $e->getLine() . ' | File: ' . $e->getFile()
            ], 500);
        }

        // 7. Return Success
        return response()->json([
            'success' => true,
            'order_id' => $order->order_number,
            'redirect_url' => route('home') // Ideally a Thank You page
        ]);
    }
}
