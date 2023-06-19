<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\UserManager;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->input('remember');
        

        $userManager = app(UserManager::class);
        $token = $userManager->auth($email, $password, $remember);
        if ($token === 0) {
            return response()->json(['error' => 'Почта не зарегистрирована'], 401);
        }
        if ($token === 1) {
            return response()->json(['error' => 'Пароль неверный'], 401);
        }

        $user = User::where('email', $email)->first();
        $role = $user->roles;
        if ($role === 'admin'){
            return $role;
        }

        return (new Response(['Authorization', 'Bearer ' . $token, [$role]], 200))->header('Access-Control-Allow-Origin', '*');
        }
}
