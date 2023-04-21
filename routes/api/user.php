<?php

use Illuminate\Support\Facades\Route;

Route::get('/user', 'App\Http\Controllers\Api\UserController@user')->middleware('cors');
Route::get('/rooms', 'App\Http\Controllers\Api\UserController@rooms')->middleware('cors');
Route::match(['options', 'post'], '/add/room', 'App\Http\Controllers\Api\UserController@createRoom')->middleware('cors');
Route::match(['options', 'post', 'delete'], '/del/room/{id}', 'App\Http\Controllers\Api\UserController@delRoom')->middleware('cors');
Route::get('/count', 'App\Http\Controllers\Api\UserController@countPlants')->middleware('cors');