<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function  __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $posts = Post::latest()->get();
        //return dd($posts);
        return view('posts.index', compact('posts'));
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
