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



Route::post('/tasks', controller@create);
Route::get('/tasks', controller@index);
Route::get('/tasks/{id}/notes', controller@indexNote);
Route::post('/tasks/{id}/note', controller@createNote);
