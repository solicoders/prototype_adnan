<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Stagiaires\StagiairesController;



Route::resource("stagiaires", StagiairesController::class);
Route::get("export-stagiaires", [StagiairesController::class, 'exportStagiaires'])->name('export.stagiaires');
Route::post("import-stagiaires", [StagiairesController::class, 'importStagiaires'])->name('import.stagiaires');




