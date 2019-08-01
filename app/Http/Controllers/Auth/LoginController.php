<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function form() {
        return view('login');
    }

    public function login() {
        $data = request()->all();

        $valid_username = config('app.auth_username');
        $valid_password = config('app.auth_password');

        if ($data['username'] == $valid_username && $data['password'] == $valid_password) {
            session(['is_auth' => true]);
            return redirect('/adresses');
        } else {
            return redirect('/login');
        }
    }
}
