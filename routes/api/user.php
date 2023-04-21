<?php

use Illuminate\Support\Facades\Route;

Route::get('/user', 'App\Http\Controllers\Api\UserController@user')->middleware('cors');