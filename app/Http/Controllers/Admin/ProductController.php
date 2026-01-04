<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Collection;
use App\Models\Attribute;
use App\Models\ProductVariant;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['variants', 'images'])->latest()->paginate(10);
        return view('admin.products', compact('products'));
    }

    public function create()
    {
        $collections = Collection::all();
        $families = Attribute::where('type', 'family')->get();
        $notes = Attribute::where('type', 'note')->get();
        return view('admin.products.create', compact('collections', 'families', 'notes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|in:active,draft',
            'variants' => 'array',
            'media.*' => 'mimes:webp',
        ]);

        $product = Product::create($request->only([
            'title', 'description', 'status', 'type', 'vendor', 
            'collection_id', 'gender', 'olfactory_family', 
            'intensity', 'oil_concentration', 'notes_top', 'notes_heart', 'notes_base'
        ]));

        // Handle Variants
        if ($request->has('variant_data')) {
            foreach ($request->variant_data as $size => $data) {
                if (isset($data['enabled'])) {
                    $product->variants()->create([
                        'size' => $size,
                        'stock' => $data['stock'] ?? 0,
                        'price' => $data['price'],
                        'compare_at_price' => $data['compare_at_price'],
                    ]);
                }
            }
        }

        // Handle Media Uploads
        if ($request->hasFile('media')) {
            foreach ($request->file('media') as $file) {
                $path = $file->store('products', 'public');
                $product->images()->create([
                    'path' => $path,
                    'type' => 'image', // simplified for now
                    'order' => 0
                ]);
            }
        }
        
        // Handle Media URLs (if any, implemented later via generic input)

        return redirect()->route('admin.products')->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = Product::with(['variants', 'images' => function($query) {
            $query->orderBy('order', 'asc');
        }])->findOrFail($id);
        $collections = Collection::all();
        $families = Attribute::where('type', 'family')->get();
        $notes = Attribute::where('type', 'note')->get();
        return view('admin.products.edit', compact('product', 'collections', 'families', 'notes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
             'media.*' => 'mimes:webp',
        ]);

        $product = Product::findOrFail($id);
        
        $product->update($request->only([
            'title', 'description', 'status', 'type', 'vendor', 
            'collection_id', 'gender', 'olfactory_family', 
            'intensity', 'oil_concentration', 'notes_top', 'notes_heart', 'notes_base'
        ]));

        // Sync Variants
        if ($request->has('variant_data')) {
            $currentVariantIds = [];
            foreach ($request->variant_data as $size => $data) {
                if (isset($data['enabled'])) {
                    $variant = $product->variants()->updateOrCreate(
                        ['size' => $size],
                        [
                            'stock' => $data['stock'] ?? 0,
                            'price' => $data['price'],
                            'compare_at_price' => $data['compare_at_price'],
                        ]
                    );
                    $currentVariantIds[] = $variant->id;
                }
            }
            // Remove variants that were unchecked
            $product->variants()->whereNotIn('id', $currentVariantIds)->delete();
        }

        // Handle Image Deletion
        if ($request->has('deleted_images')) {
            foreach ($request->deleted_images as $imageId) {
                $image = $product->images()->find($imageId);
                if ($image) {
                    if (Storage::disk('public')->exists($image->path)) {
                        Storage::disk('public')->delete($image->path);
                    }
                    $image->delete();
                }
            }
        }

        // Handle Scan/Reorder Existing Images
        if ($request->has('media_order')) {
            foreach ($request->media_order as $index => $imageId) {
                $product->images()->where('id', $imageId)->update(['order' => $index]);
            }
        }

        // Handle Media Uploads
        if ($request->hasFile('media')) {
            $startOrder = $product->images()->max('order') + 1; // Start after existing
            foreach ($request->file('media') as $index => $file) {
                $path = $file->store('products', 'public');
                $product->images()->create([
                    'path' => $path,
                    'type' => 'image',
                    'order' => $startOrder + $index
                ]);
            }
        }

        return redirect()->route('admin.products')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        // Delete images from storage
        foreach($product->images as $image) {
            Storage::disk('public')->delete($image->path);
        }
        $product->delete();
        return redirect()->route('admin.products')->with('success', 'Product deleted successfully.');
    }
}
