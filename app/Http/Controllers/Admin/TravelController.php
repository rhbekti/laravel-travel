<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Travel;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function index()
    {
        return view('travel.index', [
            'title' => 'Travel',
            'travels' => Travel::latest()->get()
        ]);
    }

    public function create()
    {
        return view('travel.create', [
            'title' => 'Add Travel'
        ]);
    }

    public function store(Request $request, Travel $travel)
    {
        $request->validate([
            'travel_number' => 'required',
            'travel_type' => 'required',
            'travel_capacity' => 'required',
            'departure' => 'required',
            'destination' => 'required',
            'departure_time' => 'required',
            'arrival_time' => 'required'
        ]);

        $data = [
            'travel_number' => $request->travel_number,
            'travel_type' => $request->travel_type,
            'travel_capacity' => $request->travel_capacity,
            'departure' => $request->departure,
            'destination' => $request->destination,
            'departure_time' => $request->departure_time,
            'arrival_time' => $request->arrival_time
        ];

        $travel->create($data);

        return redirect()->to('travels');
    }
}
