<?php

use App\Task;


Route::get('/about', function () {
    return view('about');
});

Route::get('/tasks', function () {
    $title = 'Welcome Laravel';

    // $tasks = DB::table('tasks')->get();
    $tasks = App\Task::all();
    // Добавляем 'use App\Task' и пишем так
    $tasks = Task::all();

    // $tasks = [
    //     'Go to the store',
    //     'Finish my',
    //     'Clean the house'
    // ];
    return view('tasks.index', compact('title', 'tasks'));
});

Route::get('/tasks/{task}', function ($id) {

    // $task = DB::table('tasks')->find($id);
    $task = Task::find($id);

    // dd($task);
    return view('tasks.show', compact('task'));

});
