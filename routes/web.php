<?php

use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
// home route
Route::get('/', [AuthController::class, 'index'])->name('home');
// user dashboard route
Route::get('/dashboard-user' , [AuthController::class, 'dashboard_user'])->name('dashboard_user')->middleware('auth');
// passwords  route
Route::get('/forget_password' , [AuthController::class, 'forget_password'])->name('forget_password');
Route::post('/forget_password_submit' , [AuthController::class, 'forget_password_submit'])->name('forget_password_submit');
Route::get('/reset-password/{token}/{email}' , [AuthController::class, 'reset_password'])->name('reset_password');
Route::post('reset_password_submit/' , [AuthController::class, 'reset_password_submit'])->name('reset_password_submit');
// login  route
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login_submit' , [AuthController::class, 'login_submit'])->name('login_submit');
// registration  route
Route::get('/registration' , [AuthController::class, 'registration'])->name('registration');
Route::get('/registration/verify/{token}/{email}' , [AuthController::class, 'registration_verify']);
Route::post('/registration_submit' , [AuthController::class, 'registration_submit'])->name('registration_submit');
// logout  route
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// admin  route
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin_login');
Route::post('/admin/login_submit', [AdminController::class, 'admin_login_submit'])->name('admin_login_submit');
Route::get('admin/dashboard', [AdminController::class, 'admin_dashboard'])->name('admin_dashboard')->middleware('admin:admin');
Route::get('admin/settings', [AdminController::class, 'setting'])->name('admin_setting')->middleware('admin:admin');
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin_logout');

//
