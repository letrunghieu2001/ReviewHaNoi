<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class Post extends Model
{
    use HasFactory;
    
    use Rateable;
    
    protected $guarded = [];

    protected $table = 'posts';

}
