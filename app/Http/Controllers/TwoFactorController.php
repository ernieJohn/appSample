<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class TwoFactorController extends Controller
{
    public function showForm()
    {
        return view('auth.two-factor-code');
    }
    public function verify(Request $request)
    {
        $user = User::find(session('2fa_user_id'));

        $request->validate([
            'code' => 'required|numeric',
        ]);
        if (now()->lt($user->two_factor_expires_at)) {

            if ($request->code === $user->two_factor_code) {

                Auth::login($user);
                return redirect()->intended('/home');
            }

            return back()->withErrors(['code' => 'the code is incorrect.']);
        } else {
            Auth::logout();
            return view('auth.login');
        }
    }
}
