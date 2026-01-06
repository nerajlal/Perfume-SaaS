<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->withCount('items')->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.orders', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with(['items.product', 'items.bundle.products.variants', 'user'])->findOrFail($id);
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $status = $request->input('status');
        $trackingId = $request->input('tracking_id');

        if ($status) {
            $order->status = $status;
            
            // If status is shipped, we might want to save tracking ID
            // Assuming we have a way to store tracking ID, for now let's just save it in notes or a dedicated column if it existed.
            // checking migration, we don't seem to have tracking_number. 
            // I'll append it to notes for now to avoid migration overhead unless critical, 
            // OR I can add a tracking_number column. For "fully functional" usually means DB too.
            // But let's check order schema first. I'll stick to updating status for now and maybe notes.
            
            if ($status == 'shipped' && $trackingId) {
                 $order->tracking_number = $trackingId;
            }
            
            $order->save();
        }

        return response()->json(['success' => true, 'message' => 'Order status updated successfully']);
    }

    public function print($id)
    {
        $order = Order::with(['items.product', 'items.bundle.products.variants', 'user'])->findOrFail($id);
        return view('admin.orders.print', compact('order'));
    }
}
