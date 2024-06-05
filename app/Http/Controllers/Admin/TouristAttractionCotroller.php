<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TouristAttractionCotroller extends Controller
{
    public function index()
    {
        return view('tourist_attraction.index');
    }

    public function create()
    {
        return view('tourist_attraction.create', [
            'title' => 'Add Tourist Attraction'
        ]);
    }
}
