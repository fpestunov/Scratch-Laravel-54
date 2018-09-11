<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // protect hackers input
    protected $fillable = ['title', 'body'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addComment($body)
    {
        // Comment::create([
        //     'body' => request('body'),
        //     'post_id' => $this->id // not $post, its instance
        // ]);

        // Not good yet, its Eloquent and there is relation
        // Refactor
        // Lets make without $post->id
        
        // $this->comments()->create(['body' => $body])
        // same
        $this->comments()->create(compact('body'));

    }
}
