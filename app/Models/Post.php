<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //info that comes from form
    protected $fillable = [
        'title',
        'post_text',
        'likes'
    ];

}
