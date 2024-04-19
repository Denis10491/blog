<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{

    public function index(): View
    {
        return view('admin.auth.login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        if (!Auth::guard('admin')->attempt($request->validated())) {
            return redirect()->back()->withErrors([
                'email' => 'Неверно введены данные'
            ])->withInput();
        }

        $request->session()->regenerate();

        return redirect()->route('admin.articles.index');
    }
}
