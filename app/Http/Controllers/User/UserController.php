<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginUserRequest;
use App\Mail\User\LoginUserAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        // отправка на свою же почту(решение не в продакшн)
        Mail::to(env('MAIL_USERNAME'))->send(new LoginUserAccount($email));

        return to_route('home')->with(['success' => 'Успешный вход']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('home')->with(['success' => 'Вы успешно вышли из аккаунта !']);
    }
}
