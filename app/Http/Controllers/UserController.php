<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function exit()
    {
        Auth::logout();

        //$request->session()->invalidate();

        //$request->session()->regenerateToken();

        return redirect()->route('index');
    }
}
