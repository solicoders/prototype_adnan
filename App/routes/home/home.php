<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomePage\HomePageController;


Route::middleware(['auth'])->group(function () {


Route::get("/home",  HomePageController::class)->name('home.index');

});
