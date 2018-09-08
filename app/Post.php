<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // protect hackers input
    protected $fillable = ['title', 'body'];
}
