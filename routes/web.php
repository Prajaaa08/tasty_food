<?php

use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SliderGalleryController;
use App\Http\Controllers\AboutUsController;


Route::prefix('roles')->middleware(['auth'])->controller(RoleController::class)->group(function () {
    Route::get('/', 'index')->name('roles.index');

    Route::get('/create', 'create')->name('roles.create');
    Route::post('/create', 'store')->name('roles.store');

    Route::get('/edit/{id}', 'edit')->name('roles.edit');
    Route::put('/edit/{id}', 'update')->name('roles.update');

    Route::delete('/delete/{id}', 'destroy')->name('roles.destroy');
});

Route::prefix('users')->middleware(['auth'])->controller(UserController::class)->group(function () {
    Route::get('/', 'index')->name('users.index');

    Route::get('/create', 'create')->name('users.create');
    Route::post('/create', 'store')->name('users.store');

    Route::get('/edit/{id}', 'edit')->name('users.edit');
    Route::put('/edit/{id}', 'update')->name('users.update');

    Route::delete('/delete/{id}', 'destroy')->name('users.destroy');
});

Route::prefix('menus')->middleware(['auth'])->controller(MenuController::class)->group(function () {
    Route::get('/', 'index')->name('menus.index');

    Route::get('/create', 'create')->name('menus.create');
    Route::post('/create', 'store')->name('menus.store');

    Route::get('/edit/{id}', 'edit')->name('menus.edit');
    Route::put('/edit/{id}', 'update')->name('menus.update');

    Route::delete('/delete/{id}', 'destroy')->name('menus.destroy');
});

Route::prefix('sliders')->middleware(['auth'])->controller(SliderGalleryController::class)->group(function () {
    Route::get('/', 'index')->name('sliders.index');

    Route::get('/create', 'create')->name('sliders.create');
    Route::post('/create', 'store')->name('sliders.store');

    Route::get('/edit/{id}', 'edit')->name('sliders.edit');
    Route::put('/edit/{id}', 'update')->name('sliders.update');

    Route::delete('/delete/{id}', 'destroy')->name('sliders.destroy');
});

Route::prefix('aboutUs')->middleware(['auth'])->controller(AboutUsController::class)->group(function () {
    Route::get('/', 'index')->name('aboutUs.index');

    Route::get('/create', 'create')->name('aboutUs.create');
    Route::post('/create', 'store')->name('aboutUs.store');

    Route::get('/edit/{id}', 'edit')->name('aboutUs.edit');
    Route::put('/edit/{id}', 'update')->name('aboutUs.update');

    Route::delete('/delete/{id}', 'destroy')->name('aboutUs.destroy');
});
Route::prefix('news')->middleware(['auth'])->controller(NewsController::class)->group(function () {
    Route::get('/', 'index')->name('news.index');

    Route::get('/create', 'create')->name('news.create');
    Route::post('/create', 'store')->name('news.store');

    Route::get('/edit/{id}', 'edit')->name('news.edit');
    Route::put('/edit/{id}', 'update')->name('news.update');

    Route::delete('/delete/{id}', 'destroy')->name('news.destroy');
});

Route::get('/', function () {
    return view('dashboard.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
