<?php

use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\HomePage\HomePageController;




Route::get('/localization/{locale}', LocalizationController::class)->name('localization');


Route::middleware(Localization::class)
->group(function (){
    Route::middleware(['auth'])->group(function () {


    Route::get("/home",  HomePageController::class)->name('home.index');
    
    });
});