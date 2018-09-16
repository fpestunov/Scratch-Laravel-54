<?php

namespace App;

use App\Tag;
use Carbon\Carbon;
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

    public function scopeFilter($query, $filters) 
    {
        if (isset($filters['month']) && $month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if (isset($filters['year']) && $year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }    
    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) as year, monthname(created_at) as month, count(*) as published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }    
}
