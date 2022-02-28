<?php
 
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Routes Rules
|--------------------------------------------------------------------------
|
*/
 

Route::middleware('auth')->group(function () {
    // routes user
    Route::get('/{rol}/assign-permissions', [App\Http\Controllers\RoleController::class, 'assignPermissions'])->name('roles.permissions');
    Route::put('/{rol}/insert-permissions', [App\Http\Controllers\RoleController::class, 'insertPermissions'])->name('roles.insert-permissions');
});



