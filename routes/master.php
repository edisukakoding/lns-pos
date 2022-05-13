<?php


use App\Http\Controllers\Master\DepartmentController;
use App\Http\Controllers\Master\MasterController;
use Illuminate\Support\Facades\Route;

Route::prefix('master')->middleware(['auth'])->group(function () {
    Route::get('/', [MasterController::class, 'index'])->name('layout.master');
    Route::post('/departments/data', [DepartmentController::class, 'data'])->name('departments.data');
    Route::resource('departments', DepartmentController::class)->except(['edit', 'show', 'create']);
});
