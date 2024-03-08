<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Modules\ModulesController;



Route::resource("modules", ModulesController::class);
Route::get("export-modules", [ModulesController::class, 'exportModules'])->name('export.modules');
Route::post("import-modules", [ModulesController::class, 'importModules'])->name('import.modules');




