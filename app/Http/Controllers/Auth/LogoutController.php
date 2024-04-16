<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    public function logout(): RedirectResponse
    {
        Session::flush();

        return redirect()->back();
    }
}
