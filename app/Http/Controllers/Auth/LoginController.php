<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        if (!auth()->attempt($request->validated())) {
            return redirect()->back()->withErrors([
                'email' => __('messages.login_failed')
            ])->withInput();
        }

        $request->session()->regenerate();

        return redirect()->route('home');
    }
}
