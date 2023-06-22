<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\User;
use App\Models\Assets;
use App\Models\Status;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Charts\CategoryChart;
use Illuminate\Routing\Controller;

class AssetsController extends Controller
{
    public function index(Request $request, CategoryChart  $categoryChart)
    {
        return view('home',[
            "title" =>"Asset",
            "assets" => Assets::all(),
            'categoryChart' => $categoryChart->build(),
            'users' => User::all()
            // "assets" => Assets::with(['category'])->latest()->get()
        ] 
        );
        // $assets = Assets::all();
        // return view('')->with('assets', $assets);
    }



}


