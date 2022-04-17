<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_thumb extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'posts_thumb';
}
