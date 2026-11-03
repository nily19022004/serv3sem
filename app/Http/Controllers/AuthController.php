<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth/signup');
    }

    public function signUp(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:App\Models\User',
            'password' => 'required|min:6'
        ]);
        
        $user = User::create([
            'name' => request('name'),
            'email'=> request('email'),
            'password'=> request('password'),
        ]);

        // Присваиваем токен при регистрации (опционально)
        $token = $user->createToken('myAppToken')->plainTextToken;

        // Токен можно вернуть/сохранить — для дальнейшего использования
        session(['api_token' => $token]);

        return redirect()->route('login');
    }

    public function login(){
        return view('auth.login');
    }

    /**
     * Аутентификация пользователя с присвоением токена.
     * После успешного входа — редирект на главную в обход auth-middleware.
     */
    public function customlogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = [
            'email'    => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            // Перегенерация сессии для защиты от fixation-атак
            $request->session()->regenerate();

            // Присвоение токена аутентификации текущему пользователю
            $token = Auth::user()->createToken('authToken')->plainTextToken;

            // Сохраняем токен в сессии, чтобы использовать его дальше
            session(['api_token' => $token]);

            // Редирект на главную в обход посредника auth
            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'Предоставленные данные недостаточны для подтверждения пользователя'
        ])->withInput();
    }

    public function logout(Request $request){
        // Отзываем все токены пользователя (опционально)
        if (Auth::check()) {
            Auth::user()->tokens()->delete();
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
