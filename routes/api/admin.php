<?php

use Illuminate\Support\Facades\Route;

Route::get('/queries', 'App\Http\Controllers\Api\AdminController@queries')->middleware('cors');
Route::get('query/{id}', 'App\Http\Controllers\Api\AdminController@queryById')->middleware('cors');
Route::match(['options', 'put'], 'query/edit/{id}', 'App\Http\Controllers\Api\AdminController@updateQuery')->middleware('cors');

/**
 * get  laws
 */

Route::get('/laws', 'App\Http\Controllers\Api\AdminController@laws')->middleware('cors');
Route::get('law/{id}', 'App\Http\Controllers\Api\AdminController@lawById')->middleware('cors');
Route::match(['options', 'put'], 'law/edit/{id}', 'App\Http\Controllers\Api\AdminController@updateLaw')->middleware('cors');

/**
 * filters for laws
 */

Route::get('/laws/one', 'App\Http\Controllers\Api\AdminController@lawsByStatusOne')->middleware('cors');
Route::get('/laws/two', 'App\Http\Controllers\Api\AdminController@lawsByStatusTwo')->middleware('cors');
Route::get('/laws/three', 'App\Http\Controllers\Api\AdminController@lawsByStatusThree')->middleware('cors');


/**
 * filters for queries
 */

Route::get('/queries/one', 'App\Http\Controllers\Api\AdminController@queriesByStatusOne')->middleware('cors');
Route::get('/queries/two', 'App\Http\Controllers\Api\AdminController@queriesByStatusTwo')->middleware('cors');
Route::get('/queries/three', 'App\Http\Controllers\Api\AdminController@queriesByStatusThree')->middleware('cors');

/**
 * add advice
 */

 Route::match(['options', 'post'], '/add/advice', 'App\Http\Controllers\Api\AdminController@createAdvice')->middleware('cors');

