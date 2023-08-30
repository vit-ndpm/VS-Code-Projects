<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;


class ProductImage extends Model
{
    use HasFactory;
   protected $table='product_images';
   protected $fillable=[
    'product_id',
    'image',
   ];
   public function product()
        {
            # code...
            return $this->belongsTo(Product::class,'product_id','id');
        }
}
