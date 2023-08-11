<?php

namespace App\Models;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'meta_title',
        'meta_keyword',
        'images',
        'status',
    ];

 /**
   * Get all of the category for the category
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function brand(): HasMany
  {
      return $this->hasMany(Brand::class);
  }


  public function products(): HasMany
  {
      return $this->hasMany(Product::class, 'category_id', 'id');
  }


}
