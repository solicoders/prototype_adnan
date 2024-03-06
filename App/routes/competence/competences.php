<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Competences\CompetencesController;



Route::resource("competences", CompetencesController::class);
Route::post("import-competences", [CompetencesController::class, 'importCompetences'])->name('competence.import');
Route::get("export-competences", [CompetencesController::class, 'exportCompetences'])->name('competence.export');
