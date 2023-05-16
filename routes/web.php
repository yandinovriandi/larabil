<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function (){
    //dashboard
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    //must verified email
    Route::middleware('verified')->group(function (){
        //profile
        Route::controller(ProfileController::class)->name('profile.')->group(function (){
            Route::get('/profile', 'edit')->name('edit');
            Route::patch('/profile', 'update')->name('update');
            Route::delete('/profile', 'destroy')->name('destroy');
        });
    });
    //user lists
    Route::group(['middleware' => ['role:super admin','permission:create users']],function(){
        Route::controller(UserController::class)->name('users.')->group(function (){
            Route::get('/users','index')->name('index');
        });
    });

});

Route::view('about', 'about')->name('about');

require __DIR__.'/auth.php';
