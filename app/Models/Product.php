<?php

namespace App\Models;

use App\Models\Category;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    protected $table="products";
    protected $fillable =[
        'category_id',
            'name',
            'slug',
            'brand',
            'short_description',
            'description',
            'original_price',
            'selling_price',
            'quantity',
            'trending',        
            'status',
            'image',
            'meta_title',
            'meta_keyword',
            'meta_description'
    ];
  
       
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    
    
    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
    /**
     * Get all of the productColors for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productColors()
    {
        return $this->hasMany(ProductColor::class, 'product_id', 'id');
    }
    use HasFactory;
}
