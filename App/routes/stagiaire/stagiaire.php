<?php

use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\Stagiaires\StagiairesController;




Route::get('/localization/{locale}', LocalizationController::class)->name('localization');


Route::middleware(Localization::class)
->group(function (){
    Route::middleware(['auth'])->group(function () {


        Route::resource("stagiaires", StagiairesController::class);
        Route::get("export-stagiaires", [StagiairesController::class, 'exportStagiaires'])->name('export.stagiaires');
        Route::post("import-stagiaires", [StagiairesController::class, 'importStagiaires'])->name('import.stagiaires');
        
        
        });
        
});
