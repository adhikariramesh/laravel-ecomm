<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductImage extends Model
{
    use HasFactory;

    protected $table = 'product_images';
    protected $fillable = [
        'product_id',
        'images',
    ];

    /**
     * Get the productHaveImages that owns the ProductImage
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productHaveImages(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
