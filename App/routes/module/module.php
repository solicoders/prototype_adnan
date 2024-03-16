<?php

use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\Modules\ModulesController;




Route::get('/localization/{locale}', LocalizationController::class)->name('localization');


Route::middleware(Localization::class)
->group(function (){

    Route::middleware(['auth'])->group(function () {

        Route::resource("modules", ModulesController::class);
        Route::get("export-modules", [ModulesController::class, 'exportModules'])->name('export.modules');
        Route::post("import-modules", [ModulesController::class, 'importModules'])->name('import.modules');
    
    });
    
    
});

