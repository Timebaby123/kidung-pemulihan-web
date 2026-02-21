<?php

use App\Http\Controllers\KidungController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SuplemenController;
use App\Models\Kidung;
use Illuminate\Support\Facades\Route;

Route::get("/suplemen/{id}", [SuplemenController::class,"index"])->name('SuplemenPage');
Route::get("/kidung/{id}", [KidungController::class,"index"])->name('KidungPage');
Route::get('/search',[SearchController::class,'search'])->name('Search');
Route::get('/', [MainPageController::class, 'index'])->name('MainPage');
Route::get('/get', [MainPageController::class, 'get'])->name('GetKidung');
