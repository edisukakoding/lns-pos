<?php


use App\Http\Controllers\Setting\SettingController;
use Illuminate\Support\Facades\Route;

Route::prefix('setting')->middleware(['auth'])->group(function() {
    Route::get('/', [SettingController::class, 'index'])->name('layout.setting');
});
