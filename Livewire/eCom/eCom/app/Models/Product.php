<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $fillable=[
        'name',
        'category_id',
        'slug',
        'brand',
        'small_description',
        'long_description',
        'original_price',
        'selling_price',
        'quantity',
        'trending',
        'status',
        'meta_title',
        'meta_keywords',
        'meta_description',
        ];
        public function productImages()
        {
           return $this->hasMany(ProductImage::class,'product_id','id');
    
        }
        public function productColors()
        {
           return $this->hasMany(ProductColor::class,'product_id','id');
    
        }
        public function wishlist()
        {
           return $this->hasMany(WishList::class,'product_id','id');
    
        }
        public function category()
        {
            # code...
            return $this->belongsTo(Category::class,'category_id','id');
        }
}
