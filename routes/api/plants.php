<?php

use Illuminate\Support\Facades\Route;

Route::get('categories', 'App\Http\Controllers\Api\CategoriesController@getAll')->middleware('cors');
Route::get('plants', 'App\Http\Controllers\Api\PlantsController@getAll')->middleware('cors');
Route::get('categories/{id}', 'App\Http\Controllers\Api\PlantsController@plantByCategory')->middleware('cors');
Route::get('plants/{id}', 'App\Http\Controllers\Api\PlantsController@getPlantById')->middleware('cors');
Route::get('find/{plant}', 'App\Http\Controllers\Api\PlantsController@findPlant')->middleware('cors');