<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.index');
});

Route::prefix('roles')->middleware(['guest'])->controller(RoleController::class)->group(function () {
    Route::get('/', 'index')->name('roles.index');

    Route::get('/create', 'create')->name('roles.create');
    Route::post('/create', 'store')->name('roles.store');

    Route::get('/edit/{id}', 'edit')->name('roles.edit');
    Route::put('/edit/{id}', 'update')->name('roles.update');

    Route::delete('/delete/{id}', 'destroy')->name('roles.destroy');
});

Route::prefix('users')->middleware(['guest'])->controller(UserController::class)->group(function () {
    Route::get('/', 'index')->name('users.index');

    Route::get('/create', 'create')->name('users.create');
    Route::post('/create', 'store')->name('users.store');

    Route::get('/edit/{id}', 'edit')->name('users.edit');
    Route::put('/edit/{id}', 'update')->name('users.update');

    Route::delete('/delete/{id}', 'destroy')->name('users.destroy');
});
