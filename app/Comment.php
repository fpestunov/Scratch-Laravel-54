<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // protect hackers input
    protected $fillable = ['post_id', 'body'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
