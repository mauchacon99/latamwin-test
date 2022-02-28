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
    Route::get('/{rol}/assign_permissions', [App\Http\Controllers\RoleController::class, 'assign_permissions'])->name('roles.permissions');
    Route::put('/{rol}/insert_permissions', [App\Http\Controllers\RoleController::class, 'insert_permissions'])->name('roles.insert-permissions');
});



