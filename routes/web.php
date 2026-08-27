<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VillageController;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return view('home');
});

Route::resource('villages', VillageController::class);


Route::get(
    '/villages/{village}/reports/create',
    [ReportController::class, 'create']
)->name('villages.reports.create');


Route::post(
    '/villages/{village}/reports',
    [ReportController::class, 'store']
)->name('villages.reports.store');