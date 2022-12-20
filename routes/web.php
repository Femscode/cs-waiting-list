<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::any('/sendmail', [App\Http\Controllers\UserController::class, 'sendmail'])->name('sendmail');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::any('home', function() {
    return redirect('/dashboard');
});

// Route::any('/', [App\Http\Controllers\UserController::class, 'homepage'])->name('homepage');
Route::any('/', [App\Http\Controllers\UserController::class, 'landing'])->name('landing');
Route::any('/overview', [App\Http\Controllers\UserController::class, 'overview'])->name('overview');
Route::any('/refer_friend', [App\Http\Controllers\UserController::class, 'refer_friend'])->name('refer_friend');

Route::any('/setpassword', [App\Http\Controllers\UserController::class, 'setpassword'])->name('setpassword');
Route::any('/subscribe', [App\Http\Controllers\UserController::class, 'subscribe'])->name('subscribe');
Route::any('/faq', [App\Http\Controllers\UserController::class, 'faq'])->name('faq');
Route::any('/dashboard', [App\Http\Controllers\UserController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::any('/verify/{slug}', [App\Http\Controllers\UserController::class, 'verify'])->name('verify');
Route::any('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');
Route::any('/{slug}', [App\Http\Controllers\UserController::class, 'refer_home'])->name('refer_home');

