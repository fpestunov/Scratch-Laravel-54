<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $title = 'Welcome Laravel';
        $tasks = Task::all();
        return view('tasks.index', compact('title', 'tasks'));
    }
    public function show(Task $task)
    {
        // return $thetask;
        // $task = Task::find($id);
        return view('tasks.show', compact('task'));
    }
}
