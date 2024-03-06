<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Modules\ModulesController;



Route::resource("modules", ModulesController::class);
Route::get("export", [ModulesController::class, 'exportModules'])->name('export.modules');
Route::post("import", [ModulesController::class, 'importModules'])->name('import.modules');




