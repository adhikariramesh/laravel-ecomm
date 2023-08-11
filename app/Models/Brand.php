<?php

namespace App\Models;

use App\Models\category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands';

    protected $fillable =  [

        'name',
        'slug',
        'status',
        'category_id',
    ];

    /**
    * Get the brand that owns the Brand
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class);
    }
}
