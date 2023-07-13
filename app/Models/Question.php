<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable=[
        'question_no',
        'question',
        'paper_id',
        'option1',
        'option2',
        'option3',
        'option4',
        'correct_option',
        'description',
        'subject_id',
        'topic_id',
    ];
}
