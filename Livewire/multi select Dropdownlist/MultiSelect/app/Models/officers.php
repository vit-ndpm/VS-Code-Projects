<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class officers extends Model
{
    use HasFactory;
    protected $table='officers';
    protected $fillable=['name','post'];
}
