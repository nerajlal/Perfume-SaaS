<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bundle extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'status',
        'discount_type',
        'discount_value',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'bundle_product')->withPivot('quantity')->withTimestamps();
    }

    public function getTotalPriceAttribute()
    {
        $total = $this->products->sum(function($product) {
            return $product->variants->min('price') ?? 0;
        });

        if ($this->discount_value > 0) {
            if ($this->discount_type === 'percentage') {
                $total = $total - ($total * ($this->discount_value / 100));
            } else {
                $total = $total - $this->discount_value;
            }
        }

        return max(0, $total);
    }
}
