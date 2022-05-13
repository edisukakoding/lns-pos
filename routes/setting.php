<?php


use App\Http\Controllers\Setting\SettingController;
use App\Http\Controllers\Setting\SettingWallpaperController;
use Illuminate\Support\Facades\Route;

Route::prefix('setting')->middleware(['auth'])->group(function() {
    Route::get('/', [SettingController::class, 'index'])->name('layout.setting');
    Route::post('/themes', [SettingController::class, 'getThemes'])->name('setting.themes');
    Route::post('/themes/{value}/set', [SettingController::class, 'setTheme'])->name('setting.themes.set');
    Route::resource('/settingwallpapers', SettingWallpaperController::class);
});
