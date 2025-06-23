<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TwoFactorController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
})->middleware('auth');
Route::get('/two-factor-challenge', [TwoFactorController::class, 'showForm']);
Route::post('/two-factor/verify', [TwoFactorController::class, 'verify'])->name('2fa.verify');