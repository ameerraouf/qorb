<?php

use App\Http\Controllers\Auth\TeacherLoginController;
use App\Http\Controllers\Teacher\ChildrenController;
use App\Http\Controllers\Teacher\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [TeacherLoginController::class, 'showLoginForm'])->name('teacher.login');
Route::post('/login/submit', [TeacherLoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [TeacherLoginController::class, 'logout'])->name('teacher.logout');
Route::get('/Register', [TeacherLoginController::class, 'showRegisterForm'])->name('teacher.register');
Route::post('/Register/submit', [TeacherLoginController::class, 'store'])->name('Register.submit');

// Route::get('/teacherhome', function () {
//     return 'hello';
// $2y$10$nob3NA3ZE26PfyYPJSzQDegQ1DVTYuEDSnjuE8rTHTFv9h2E46IWO
// })->name('teacherhome');
Route::group(['middleware'=>'auth:teacher'],function(){

    Route::get('/teacherhome', [HomeController::class, 'index'])->name('teacher.teacherhome');
    // children routes
    Route::controller(ChildrenController::class)->group(function(){
        Route::resource('childrens',ChildrenController::class)->except('show');
        Route::post('/childrens/remove_image','remove_image')->name('childrens.remove_image');
     });

});
//
