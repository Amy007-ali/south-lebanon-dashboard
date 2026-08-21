<?php

use App\Http\Controllers\VillageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/villages', [VillageController::class, 'index']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/reports', [VillageController::class, 'reports']);