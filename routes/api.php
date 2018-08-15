<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('tasks', 'tasksController@create');
Route::get('tasks', 'tasksController@index');
Route::get('tasks/{id}', 'tasksController@show');

Route::get('/tasks/{id}/notes', 'notesController@index');
Route::post('tasks/{id}/notes', 'notesController@create');

