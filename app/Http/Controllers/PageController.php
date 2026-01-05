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
            
        $collections = \App\Models\Collection::where('status', true)->get();
        
        $bundles = \App\Models\Bundle::where('status', 'active')->latest()->take(4)->get();
            
        return view('nurah.home', compact('sliders', 'bestsellers', 'collections', 'bundles'));
    }

    public function collection(Request $request)
    {
        $title = 'Fresh Perfumes';
        $query = \App\Models\Product::where('status', 'active')->with(['variants', 'images']);

        if ($request->has('category')) {
            $category = $request->query('category');
            if ($category == 'fresh') {
                $title = 'Fresh Collection';
                $query->where('olfactory_family', 'LIKE', '%Fresh%');
            }
            elseif ($category == 'oriental-woody') {
                $title = 'Oriental & Woody Collection';
                $query->where(function($q) {
                    $q->where('olfactory_family', 'LIKE', '%Oriental%')
                      ->orWhere('olfactory_family', 'LIKE', '%Woody%');
                });
            }
            elseif ($category == 'floral') {
                $title = 'Floral Collection';
                $query->where('olfactory_family', 'LIKE', '%Floral%');
            }
        } elseif ($request->has('gender')) {
            $gender = $request->query('gender');
            if ($gender == 'for-him') {
                $title = 'Perfumes For Him';
                $query->whereIn('gender', ['Men', 'Male', 'Him']);
            }
            elseif ($gender == 'for-her') {
                $title = 'Perfumes For Her';
                $query->whereIn('gender', ['Women', 'Female', 'Her']);
            }
            elseif ($gender == 'unisex') {
                $title = 'Unisex Collection';
                $query->whereIn('gender', ['Unisex', 'All']);
            }
        }

        $products = $query->latest()->get();

        // Calculate filter counts (Scoped to current collection or global? Usually global for sidebar context, but let's scope to result for now or reuse global logic)
        // For simplicity reusing global logic on the fetched set for now
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
            if(in_array($g, ['men', 'man', 'him', 'male'])) $counts['gender_him']++;
            elseif(in_array($g, ['women', 'woman', 'her', 'female'])) $counts['gender_her']++;
            else $counts['gender_unisex']++;

            // Sizes
            $sizes = $product->variants->pluck('size')->map(fn($s) => strtolower($s))->toArray();
            if(in_array('50ml', $sizes)) $counts['size_50ml']++;
            if(in_array('100ml', $sizes)) $counts['size_100ml']++;
        }

        return view('nurah.collection', compact('title', 'products', 'counts'));
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

    public function combos()
    {
        // Fetch all active bundles
        $bundles = \App\Models\Bundle::where('status', 'active')
            ->with(['products'])
            ->latest()
            ->get();

        return view('nurah.combos', [
            'title' => 'Combos & Bundles',
            'bundles' => $bundles
        ]);
    }

    public function combo(Request $request)
    {
        $id = $request->query('id');
        $bundle = \App\Models\Bundle::where('status', 'active')
            ->with(['products.images', 'products.variants'])
            ->findOrFail($id);

        // Fetch related bundles (excluding current)
        $relatedBundles = \App\Models\Bundle::where('status', 'active')
            ->where('id', '!=', $id)
            ->inRandomOrder()
            ->limit(4)
            ->get();

        return view('nurah.bundle-main', compact('bundle', 'relatedBundles'));
    }

    public function product(Request $request)
    {
        $id = $request->query('id');
        $product = \App\Models\Product::where('status', 'active')
            ->with(['variants', 'images'])
            ->findOrFail($id);

        // Track Recently Viewed
        $recentlyViewed = session()->get('recently_viewed', []);
        
        // Remove current ID if exists to re-add at top (most recent)
        if(($key = array_search($id, $recentlyViewed)) !== false) {
            unset($recentlyViewed[$key]);
        }
        
        // Add to front
        array_unshift($recentlyViewed, $id);
        
        // Keep only last 4
        $recentlyViewed = array_slice($recentlyViewed, 0, 4);
        
        // Save back to session
        session()->put('recently_viewed', $recentlyViewed);

        // Fetch Related Products (Recently Viewed excluding current)
        // We filter out the current product ID just in case logic above overlaps or visual preference
        $relatedIds = array_diff($recentlyViewed, [$id]);
        
        if(count($relatedIds) > 0) {
            $relatedProducts = \App\Models\Product::whereIn('id', $relatedIds)
                ->where('status', 'active')
                ->with(['images', 'variants'])
                ->get()
                ->sortBy(function($model) use ($relatedIds) {
                    return array_search($model->id, $relatedIds);
                });
        } else {
            $relatedProducts = collect();
        }
        
        // Fetch specific active coupon for this product
        $coupon = $product->discounts()
            ->where('status', 'active')
            ->where(function($q) {
                $q->whereNull('starts_at')->orWhere('starts_at', '<=', now());
            })
            ->where(function($q) {
                $q->whereNull('ends_at')->orWhere('ends_at', '>=', now());
            })
            ->orderByDesc('value')
            ->first();

        // Fetch active bundle (if any)
        $bundle = $product->bundles()
            ->where('status', 'active')
            ->first();
            
        return view('nurah.product-main', compact('product', 'relatedProducts', 'coupon', 'bundle'));
    }
}
