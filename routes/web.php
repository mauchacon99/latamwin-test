<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '\web\auth.php';



Route::middleware('auth')->group(function () {
    // routes user
    Route::resource('users', App\Http\Controllers\UserController::class);
    // routes roles
    Route::resource('roles', App\Http\Controllers\RoleController::class);
});
 
// routes user
Route::group(['prefix' => 'user'], function () {
    require __DIR__ . '\web\user.php';
});

// routes role
Route::group(['prefix' => 'role'], function () {
    require __DIR__ . '\web\role.php';
});
