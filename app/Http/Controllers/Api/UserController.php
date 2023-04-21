<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\UserManager;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    var $manager;

    function __construct() {
        $this->manager = app(UserManager::class);
    }

    public function user(){
        $user = User::all()->find(Auth::user());

        return new UserResource($user);
    }
}
