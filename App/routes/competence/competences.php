<?php

use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\Competences\CompetencesController;




Route::get('/localization/{locale}', LocalizationController::class)->name('localization');


Route::middleware(Localization::class)
->group(function (){
    Route::middleware(['auth'])->group(function () {

        Route::resource("competences", CompetencesController::class);
        Route::post("import-competences", [CompetencesController::class, 'importCompetences'])->name('competence.import');
        Route::get("export-competences", [CompetencesController::class, 'exportCompetences'])->name('competence.export');
    
    });
});