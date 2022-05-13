<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\SettingWallpaper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SettingWallpaperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        return view('setting.wallpaper.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SettingWallpaper  $settingWallpaper
     * @return \Illuminate\Http\Response
     */
    public function show(SettingWallpaper $settingWallpaper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SettingWallpaper  $settingWallpaper
     * @return \Illuminate\Http\Response
     */
    public function edit(SettingWallpaper $settingWallpaper)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SettingWallpaper  $settingWallpaper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SettingWallpaper $settingWallpaper)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SettingWallpaper  $settingWallpaper
     * @return \Illuminate\Http\Response
     */
    public function destroy(SettingWallpaper $settingWallpaper)
    {
        //
    }
}
