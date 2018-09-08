<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/about', function () {
    return view('about');
});

Route::get('/tasks', function () {
    $title = 'Welcome Laravel';

    $tasks = DB::table('tasks')->get();

    // $tasks = [
    //     'Go to the store',
    //     'Finish my',
    //     'Clean the house'
    // ];
    return view('tasks.index', compact('title', 'tasks'));
});

Route::get('/tasks/{task}', function ($id) {
    
    $task = DB::table('tasks')->find($id);
    // dd($task);
    return view('tasks.show', compact('task'));

});
