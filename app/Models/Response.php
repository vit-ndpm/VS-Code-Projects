<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;
    public $table = "responses";
    public $fillable = [
        'user_id',
        'paper_id',
        'question_id',
        'selected_option'
    ];
    
}
