<?php
 
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Routes Rules
|--------------------------------------------------------------------------
|
*/


Route::get('role/{rol}/assign-permissions', [App\Http\Controllers\RoleController::class, 'assignPermissions'])->name('roles.permissions');
Route::put('role/{rol}/insert-permissions', [App\Http\Controllers\RoleController::class, 'insertPermissions'])->name('roles.insert-permissions');