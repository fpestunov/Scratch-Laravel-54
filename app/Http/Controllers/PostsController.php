<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
// use Carbon\Carbon;

class PostsController extends Controller
{
    public function  __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        // $posts = Post::latest()->get();
        // $posts = Post::latest();
        $posts = Post::latest()
            ->filter(request(['month', 'year']))
            ->get();

        // if ($month = request('month')) {
        //     $posts->whereMonth('created_at', Carbon::parse($month)->month);
        // }

        // if ($year = request('year')) {
        //     $posts->whereYear('created_at', $year);
        // }

        // $posts = $posts->get();

        $archives = Post::selectRaw('year(created_at) as year, monthname(created_at) as month, count(*) as published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();

        //return dd($posts);
        return view('posts.index', compact('posts', 'archives'));
    }
    
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        // 1 Create post
        // $post = new Post;
        // $post->title = request('title');
        // $post->body = request('body');

        // 2 Save it to database
        // $post->save();

        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        // Вариант 1. Рабочий
        // Post::create([
        //     'title' => request('title'),
        //     'body' => request('body'),
        //     'user_id' => auth()->id()
        // ]);
        
        // Вариант 2. Красивее
        auth()->user()->publish(
            new Post(request(['title', 'body']))
        );

        // 3 Redirect somewhere
        return redirect()->home();
    }}
