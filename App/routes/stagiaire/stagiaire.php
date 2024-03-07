<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Stagiaires\StagiaireController;



Route::resource("stagiaire", StagiaireController::class);
Route::get("export", [StagiaireController::class, 'exportStagiaires'])->name('export.Stagiaires');
Route::post("import", [StagiaireController::class, 'importStagiaires'])->name('import.Stagiaires');




