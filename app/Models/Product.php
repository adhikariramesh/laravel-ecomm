<?php

namespace App\Models;

use App\Models\category;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'brand',
        'small_description',
        'description',
        'original_price',
        'selling_price',
        'quantity',
        'tranding',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_description',
    ];


    public function productImages(): HasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
    public function productcolors(): HasMany
    {
        return $this->hasMany(ProductColor::class, 'product_id', 'id');
    }


    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class, 'category_id', 'id');
    }
}
