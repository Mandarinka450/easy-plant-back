<?php

use Illuminate\Support\Facades\Route;

Route::get('/user', 'App\Http\Controllers\Api\UserController@user')->middleware('cors');
Route::get('/rooms', 'App\Http\Controllers\Api\UserController@rooms')->middleware('cors');
Route::match(['options', 'post'], '/add/room', 'App\Http\Controllers\Api\UserController@createRoom')->middleware('cors');
Route::match(['options', 'post', 'delete'], '/del/room/{id}', 'App\Http\Controllers\Api\UserController@delRoom')->middleware('cors');
Route::get('/count', 'App\Http\Controllers\Api\UserController@countPlants')->middleware('cors');
Route::match(['options', 'post'], '/add/plant', 'App\Http\Controllers\Api\UserController@addPlant')->middleware('cors');
Route::get('/myplants', 'App\Http\Controllers\Api\UserController@myplants')->middleware('cors');
Route::get('myplant/{id}', 'App\Http\Controllers\Api\UserController@getMyPlantById')->middleware('cors');
Route::get('/advice?page=', 'App\Http\Controllers\Api\UserController@getAllAdvice')->middleware('cors');
Route::get('advice/{id}', 'App\Http\Controllers\Api\UserController@getAdviceById')->middleware('cors');
Route::match(['options', 'put'], 'user/edit', 'App\Http\Controllers\Api\UserController@updateUser')->middleware('cors');
Route::get('room/{id}', 'App\Http\Controllers\Api\UserController@getMyRoomById')->middleware('cors');
Route::match(['options', 'put'], 'room/edit/{id}', 'App\Http\Controllers\Api\UserController@updateRoom')->middleware('cors');
Route::match(['options', 'post'], '/add/law', 'App\Http\Controllers\Api\UserController@createLaw')->middleware('cors');
Route::match(['options', 'post', 'delete'], '/del/plant/{id}', 'App\Http\Controllers\Api\UserController@delPlant')->middleware('cors');
Route::match(['options', 'put'], 'plant/edit/{id}', 'App\Http\Controllers\Api\UserController@updateMyPlant')->middleware('cors');
Route::get('/mylaws', 'App\Http\Controllers\Api\UserController@myLaws')->middleware('cors');
Route::get('/roomByPlant/{id}', 'App\Http\Controllers\Api\UserController@roomByPlant')->middleware('cors');
Route::match(['options', 'post'], '/add/reminder', 'App\Http\Controllers\Api\UserController@createReminder')->middleware('cors');
Route::get('/myremind/{id}', 'App\Http\Controllers\Api\UserController@remindByPlant')->middleware('cors');
Route::get('/reminders', 'App\Http\Controllers\Api\UserController@getReminders')->middleware('cors');

/**
 * for postman
 */
Route::match(['options', 'post'], '/add/plants', 'App\Http\Controllers\Api\UserController@createPlants')->middleware('cors');
Route::match(['options', 'post'], '/add/categories', 'App\Http\Controllers\Api\UserController@createCategories')->middleware('cors');

/**
 * updte reminder
 */

 Route::match(['options', 'put'], 'remind/edit/{id}', 'App\Http\Controllers\Api\UserController@updateMyRemind')->middleware('cors');