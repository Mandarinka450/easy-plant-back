<?php

use Illuminate\Support\Facades\Route;

Route::match(['options', 'post'],'login', 'App\Http\Controllers\Auth\LoginController@login')->middleware('cors');
Route::match(['options', 'post'],'register', 'App\Http\Controllers\Auth\RegisterController@register')->middleware('cors');
Route::match(['options', 'post'],'logout', 'App\Http\Controllers\Auth\LogoutController@logout')->middleware('cors', 'auth');