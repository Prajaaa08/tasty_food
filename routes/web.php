<?php

use App\Http\Controllers\RoleController;
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
