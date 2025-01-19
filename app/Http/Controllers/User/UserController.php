<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(LoginUserRequest $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $remember = $request->input('remember');

        if (!Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
            return back()->with(['errors'=> 'Ошибка авторизации']);
        }
        return to_route('home')->with(['success' => 'Успешный вход']);
    }

    public function logout()
    {

    }
}
