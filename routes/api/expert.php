<?php

use Illuminate\Support\Facades\Route;

Route::match(['options', 'post'], '/add/query', 'App\Http\Controllers\Api\ExpertController@createQuery')->middleware('cors');
Route::get('/myqueries', 'App\Http\Controllers\Api\ExpertController@myQueries')->middleware('cors');
Route::get('/myadvice', 'App\Http\Controllers\Api\ExpertController@myAdvice')->middleware('cors');