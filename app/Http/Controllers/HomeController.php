<?php

namespace App\Http\Controllers;

use App\Models\TouristAttraction;
use App\Models\Travel;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'tourists' => TouristAttraction::latest()->get()
        ]);
    }
}
