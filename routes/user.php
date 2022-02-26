<?php
/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/


use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;



Route::middleware('auth')->group(function () {
    Route::resource('user', 'UserController');
});
