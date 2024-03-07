<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Stagiaires\StagiairesController;



Route::resource("modules", StagiairesController::class);
Route::get("export", [StagiairesController::class, 'exportStagiaires'])->name('export.Stagiaires');
Route::post("import", [StagiairesController::class, 'importStagiaires'])->name('import.Stagiaires');




