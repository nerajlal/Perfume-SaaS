<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $sliders = \App\Models\Slider::where('status', true)
            ->orderBy('order', 'asc')
            ->get();

        $bestsellers = \App\Models\HomeProduct::with(['product.variants', 'product.images'])
            ->orderBy('sort_order', 'asc')
            ->get();
            
        return view('nurah.home', compact('sliders', 'bestsellers'));
    }

    public function collection(Request $request)
    {
        $title = 'Fresh Perfumes';

        if ($request->has('category')) {
            $category = $request->query('category');
            if ($category == 'fresh') $title = 'Fresh Collection';
            elseif ($category == 'oriental-woody') $title = 'Oriental & Woody Collection';
            elseif ($category == 'floral') $title = 'Floral Collection';
        } elseif ($request->has('gender')) {
            $gender = $request->query('gender');
            if ($gender == 'for-him') $title = 'Perfumes For Him';
            elseif ($gender == 'for-her') $title = 'Perfumes For Her';
            elseif ($gender == 'unisex') $title = 'Unisex Collection';
        }

        return view('nurah.collection', ['title' => $title]);
    }

    public function allProducts()
    {
        // Fetch all active products for client-side filtering
        $products = \App\Models\Product::where('status', 'active')
            ->with(['variants', 'images'])
            ->latest() // default sort
            ->get();

        // Calculate filter counts
        $counts = [
            'stock_in' => 0,
            'stock_out' => 0,
            'gender_him' => 0,
            'gender_her' => 0,
            'gender_unisex' => 0,
            'size_50ml' => 0,
            'size_100ml' => 0
        ];

        foreach($products as $product) {
            // Stock
            $inStock = $product->variants->sum('stock') > 0;
            if($inStock) $counts['stock_in']++;
            else $counts['stock_out']++;

            // Gender
            $g = strtolower($product->gender);
            if(in_array($g, ['men', 'man', 'him'])) $counts['gender_him']++;
            elseif(in_array($g, ['women', 'woman', 'her'])) $counts['gender_her']++;
            else $counts['gender_unisex']++; // Default to unisex for others

            // Sizes
            $sizes = $product->variants->pluck('size')->map(fn($s) => strtolower($s))->toArray();
            if(in_array('50ml', $sizes)) $counts['size_50ml']++;
            if(in_array('100ml', $sizes)) $counts['size_100ml']++;
        }

        return view('nurah.all-products', [
            'title' => 'All Products',
            'products' => $products,
            'counts' => $counts
        ]);
    }

    public function cosmopolitan()
    {
        return view('nurah.collection', ['title' => 'Cosmopolitan Collection']);
    }

    public function product(Request $request)
    {
        $id = $request->query('id');
        $product = \App\Models\Product::where('status', 'active')
            ->with(['variants', 'images'])
            ->findOrFail($id);
            
        return view('nurah.product-main', compact('product'));
    }
}
