<?php

use App\Http\Controllers\AboutClientController;
use App\Http\Controllers\ContactClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryCLientController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\NewsClientController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SliderGalleryController;
use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BusinessInformationController;


Route::prefix('roles')->middleware(['auth'])->controller(RoleController::class)->group(function () {
    Route::get('/', 'index')->name('admin.roles.index');

    Route::get('/create', 'create')->name('admin.roles.create');
    Route::post('/create', 'store')->name('admin.roles.store');

    Route::get('/edit/{id}', 'edit')->name('admin.roles.edit');
    Route::put('/edit/{id}', 'update')->name('admin.roles.update');

    Route::delete('/delete/{id}', 'destroy')->name('admin.roles.destroy');
});

Route::prefix('users')->middleware(['auth'])->controller(UserController::class)->group(function () {
    Route::get('/', 'index')->name('admin.users.index');

    Route::get('/create', 'create')->name('admin.users.create');
    Route::post('/create', 'store')->name('admin.users.store');

    Route::get('/edit/{id}', 'edit')->name('admin.users.edit');
    Route::put('/edit/{id}', 'update')->name('admin.users.update');

    Route::delete('/delete/{id}', 'destroy')->name('admin.users.destroy');
});

Route::prefix('menus')->middleware(['auth'])->controller(MenuController::class)->group(function () {
    Route::get('/', 'index')->name('admin.menus.index');

    Route::get('/create', 'create')->name('admin.menus.create');
    Route::post('/create', 'store')->name('admin.menus.store');

    Route::get('/edit/{id}', 'edit')->name('admin.menus.edit');
    Route::put('/edit/{id}', 'update')->name('admin.menus.update');

    Route::delete('/delete/{id}', 'destroy')->name('admin.menus.destroy');
});

Route::prefix('sliders')->middleware(['auth'])->controller(SliderGalleryController::class)->group(function () {
    Route::get('/', 'index')->name('admin.sliders.index');

    Route::get('/create', 'create')->name('admin.sliders.create');
    Route::post('/create', 'store')->name('admin.sliders.store');

    Route::get('/edit/{id}', 'edit')->name('admin.sliders.edit');
    Route::put('/edit/{id}', 'update')->name('admin.sliders.update');

    Route::delete('/delete/{id}', 'destroy')->name('admin.sliders.destroy');
});

Route::prefix('aboutUs')->middleware(['auth'])->controller(AboutUsController::class)->group(function () {
    Route::get('/', 'index')->name('admin.aboutUs.index');

    Route::get('/create', 'create')->name('admin.aboutUs.create');
    Route::post('/create', 'store')->name('admin.aboutUs.store');

    Route::get('/edit/{id}', 'edit')->name('admin.aboutUs.edit');
    Route::put('/edit/{id}', 'update')->name('admin.aboutUs.update');

    Route::delete('/delete/{id}', 'destroy')->name('admin.aboutUs.destroy');
    Route::delete('/delete-photo/{id}/{side}', 'deletePhoto')->name('admin.aboutUs.deletePhoto');
});
Route::prefix('news')->middleware(['auth'])->controller(NewsController::class)->group(function () {
    Route::get('/', 'index')->name('admin.news.index');

    Route::get('/create', 'create')->name('admin.news.create');
    Route::post('/create', 'store')->name('admin.news.store');

    Route::get('/edit/{id}', 'edit')->name('admin.news.edit');
    Route::put('/edit/{id}', 'update')->name('admin.news.update');

    Route::delete('/delete/{id}', 'destroy')->name('admin.news.destroy');
});
Route::prefix('gallerys')->middleware(['auth'])->controller(GalleryController::class)->group(function () {
    Route::get('/', 'index')->name('admin.gallerys.index');

    Route::get('/create', 'create')->name('admin.gallerys.create');
    Route::post('/create', 'store')->name('admin.gallerys.store');

    Route::get('/edit/{id}', 'edit')->name('admin.gallerys.edit');
    Route::put('/edit/{id}', 'update')->name('admin.gallerys.update');

    Route::delete('/delete/{id}', 'destroy')->name('admin.gallerys.destroy');
});
Route::prefix('contacts')->middleware(['auth'])->controller(ContactController::class)->group(function () {
    Route::get('/', 'index')->name('admin.contacts.index');
    Route::get('/show/{id}', 'show')->name('admin.contacts.show');
    Route::delete('/contacts/{id}' , 'destroy')->name('admin.contacts.destroy');
});
Route::middleware('auth')->controller(BusinessInformationController::class)->group(function () {
    Route::get('admin/business/edit', 'edit')->name('admin.business.edit');
    Route::post('admin/business/update', 'update')->name('admin.business.update');
});

Route::get('/', [HomeController::class, 'index'])->middleware(['verified'])->name('home');

Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard.index');
// Rute untuk halaman gallery clients yang bisa diakses dari home
Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/gallery', [GalleryCLientController::class, 'index'])->name('gallery.index');
Route::get('/berita', [NewsClientController::class, 'index'])->name('berita.index');
Route::get('/about', [AboutClientController::class, 'index'])->name('about.index');
Route::get('/contact', [ContactClientController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactClientController::class, 'store'])->name('contact.store');

// Route::get('/', function () {
//     return view('admin.dashboard.index');
// })->middleware(['auth', 'verified'])->name('admin.dashboard.index');

// News
Route::middleware(['auth', 'access'])->name('news_access')->get('/admin/news', [NewsController::class, 'index']);

// Menu
Route::middleware(['auth', 'access'])->name('menu_access')->get('/admin/menus', [MenuController::class, 'index']);

// About Us
Route::middleware(['auth', 'access'])->name('about_us_access')->get('/admin/aboutUs', [AboutusController::class, 'index']);


// Slider Gallery
Route::middleware(['auth', 'access'])->name('slider_gallery_access')->get('/admin/sliders', [SliderGalleryController::class, 'index']);

// Users
Route::middleware(['auth', 'access'])->name('users_access')->get('/admin/users', [UserController::class, 'index']);

// Gallery
Route::middleware(['auth', 'access'])->name('gallery_access')->get('/admin/gallerys', [GalleryController::class, 'index']);

// Contact
Route::middleware(['auth', 'access'])->name('contact_access')->get('/admin/contacts', [ContactController::class, 'index']);

// Business Info
Route::middleware(['auth', 'access'])->name('business_information_access')->get('/admin/business', [BusinessInformationController::class, 'index']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
