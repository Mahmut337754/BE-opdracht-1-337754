<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'wachtwoord' => 'required',
        ]);

        $user = DB::table('users')
            ->where('email', $request->email)
            ->where('wachtwoord', $request->wachtwoord)
            ->first();

        if ($user) {
            session(['user' => $user]);
            return redirect()->route('magazijn.overzicht');
        }

        return back()->withErrors(['email' => 'Email of wachtwoord is onjuist']);
    }

    public function logout()
    {
        session()->forget('user');
        return redirect()->route('login');
    }
}
