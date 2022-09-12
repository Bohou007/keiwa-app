<?php

use Spatie\Health\Http\Controllers\HealthCheckResultsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\CheckHealthController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'home']);
    Route::get('/listes-des-demandes', [AdminController::class, 'index'])->name('forms-listes');

    Route::get('profile', function () {
        return view('profile');
    })->name('profile');

    Route::get('listes-utilisateurs', [InfoUserController::class, 'index'])->name('user-management');
    Route::post('register-admin', [RegisterController::class, 'store'])->name('register-admin');

    Route::post('admin-reset-password', [ChangePasswordController::class, 'updatePassword'])->name('updatePassword');

    Route::get('forms-export', [FormsController::class, 'export'])->name('forms.export');

    Route::get('/logout', [SessionsController::class, 'destroy']);
    Route::get('/mon-compte', [InfoUserController::class, 'create']);
    Route::post('/user-profile', [InfoUserController::class, 'store']);
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [HomeController::class, 'form']);
    Route::get('/agilly-digital/wps-admin-keiwa-pass-register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
});

Route::resource('/forms', FormsController::class);

Route::get('/', function () {
    return view('form');
})->name('form');


Route::get('/success', function () {
    return view('succes');
})->name('succes');

Route::get('/admin/wps-keiwa-pass-login', function () {
    return view('session/login');
})->name('login');
