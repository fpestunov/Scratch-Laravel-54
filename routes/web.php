<?php

Route::get('/about', function () {
    return view('about');
});
Route::get('/tasks', 'TaskController@index');
Route::get('/tasks/{task}', 'TaskController@show');

