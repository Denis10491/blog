<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showRegister(): View
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        User::create($request->validated());

        return redirect()->route('login');
    }

    public function showLogin(): View
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        if (!auth()->attempt($request->validated())) {
            return redirect()->back()->withErrors([
                'email' => 'Неверно введены данные'
            ])->withInput();
        }

        $request->session()->regenerate();

        return redirect()->route('home');
    }
}
