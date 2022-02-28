<?php
 
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Routes Rules
|--------------------------------------------------------------------------
|
*/
 

Route::middleware('auth')->group(function () {
    // routes roles
    Route::get('/{rol}/assign-permissions', [App\Http\Controllers\RoleController::class, 'assign_permissions'])->name('roles.permissions');
    Route::put('/{rol}/insert-permissions', [App\Http\Controllers\RoleController::class, 'insert_permissions'])->name('roles.insert_permissions');
});



