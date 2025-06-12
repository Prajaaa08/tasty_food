<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'dashboard.index');

Route::view('/roles', 'roles.index');
Route::view('/roles/create', 'roles.form');
