<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WishList extends Model
{
    use HasFactory;
    protected $table='wish_lists';
    protected $fillable=[
        'user_id',
        'product_id'
    ];
    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
