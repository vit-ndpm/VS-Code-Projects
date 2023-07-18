<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    use HasFactory;
    public $table = "password_resets";
    protected $primaryKey = 'email';
    protected $keyType = 'string';
    public $timestamps = false;
    public $fillable = [
        'email',
        'token',
        'created_at'
    ];
}
