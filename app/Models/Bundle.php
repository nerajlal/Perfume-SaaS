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
        'status',
        'discount_type',
        'discount_value',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'bundle_product')->withPivot('quantity')->withTimestamps();
    }
}
