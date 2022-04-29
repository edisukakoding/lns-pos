<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function sample(): Factory|View|Application
    {
        return view('sample');
    }

    public function data(): Collection
    {
        return Sample::all();
    }

    public function store(Request $request)
    {
//        dd($request);
        return Sample::create($request);
    }
}
