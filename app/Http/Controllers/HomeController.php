<?php

namespace App\Http\Controllers;

use App\Models\TouristSpot;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index()
    {
        return view('home', [
            'touristSpots' => TouristSpot::latest()->filter(request(['search']))->paginate(6)
        ]);
    }
}
