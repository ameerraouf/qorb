<?php

use App\Http\Controllers\Auth\TeacherLoginController;
use App\Http\Controllers\Teacher\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [TeacherLoginController::class, 'showLoginForm'])->name('teacher.login');
Route::post('/login/submit', [TeacherLoginController::class, 'login'])->name('login.submit');
Route::post('logout/', [TeacherLoginController::class, 'logout'])->name('teacher.logout');

// Route::get('/teacherhome', function () {
//     return 'hello';
// })->name('teacherhome');
Route::get('/teacherhome', [HomeController::class, 'index'])->name('teacher.teacherhome');
//
