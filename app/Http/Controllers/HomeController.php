<?php

namespace App\Http\Controllers;

use App\Models\Booking;
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

    public function show(TouristAttraction $touristAttraction)
    {
        $bookings = Booking::getDataByTouristId($touristAttraction->id);

        return view('detail-tourist', [
            'tourist' => $touristAttraction,
            'bookings' => $bookings
        ]);
    }
}
