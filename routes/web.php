<?php

Route::get('/posts', 'PostsController@index');
Route::get('/posts/{post}', 'PostsController@show');

Route::get('/tasks', 'TaskController@index');
Route::get('/tasks/{task}', 'TaskController@show');

