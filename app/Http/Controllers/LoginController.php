<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('home');
        } else {
            return view('login');
        }
    }

    public function actionLogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($data)) {
            $user = Auth::user();

            if ($user->active) {
                return view('home');
            } else {
                Auth::logout();
                Session::flash('error', 'Akun Anda belum diverifikasi. Silakan cek email Anda.');
                return redirect('/');
            }
        } else {
            Session::flash('error', 'Email atau password salah');
            return redirect('/');
        }
    }

    public function actionLogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
