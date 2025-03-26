<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PasswordResetController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::domain(env('ADMIN_DOMAIN'))->group(function () {
	Route::middleware(['guest'])->group(function () {

        Route::controller(LoginController::class)->group(function () {
            Route::get('login', 'loginView')->name('admin.login');
            Route::post('adminlogin', 'login')->name('admin.adminlogin');
        });

        Route::controller(PasswordResetController::class)->group(function () {
            Route::get('forgot-password', 'index')->name('admin.password.request');
            Route::post('forgotPassword', 'forgotPassword')->name('admin.password.email');
            Route::get('reset-password/{token}', 'resetForm')->name('admin.password.reset');
            Route::post('password-reset', 'resetPassword')->name('admin.password.update');
            Route::get('password-success', 'resetPasswordSuccess')->name('admin.password.reset.success');
        });
    });

    Route::middleware(['auth.admin', 'admin'])->group(function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('logout', 'logout')->name('admin.logout');
        });

        Route::controller(DashboardController::class)->group(function () {
            Route::get('/', function () {
                return redirect()->route('admin.dashboard');
            });
            Route::get('/dashboard', 'dashboard')->name('admin.dashboard');
        });
    });
});