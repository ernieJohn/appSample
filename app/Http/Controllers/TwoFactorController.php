<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TwoFactorController extends Controller
{
    public function showForm(){
        return view ('auth.two-factor-code');
    }
}
