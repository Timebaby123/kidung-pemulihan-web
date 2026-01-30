<?php

use App\Http\Controllers\SuplemenController;
use Illuminate\Support\Facades\Route;

Route::get("/suplemen/{id}", [SuplemenController::class,"index"])->name('SuplemenPage');
