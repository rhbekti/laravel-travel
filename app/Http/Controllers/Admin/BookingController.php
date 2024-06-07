<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\TouristAttraction;
use App\Models\Travel;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return view('booking.index', [
            'title' => 'Booking',
            'bookings' => Booking::latest()->get()
        ]);
    }

    public function create()
    {
        return view('booking.create', [
            'title' => 'Add Booking',
            'travels' => Travel::all(),
            'tourists' => TouristAttraction::all(),
            'booking' => new Booking()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'bookingDate' => 'required|date',
            'attractionId' => 'required',
            'travelId' => 'required',
            'totalAmount' => 'required|numeric'
        ]);

        Booking::create($request->all());

        return redirect()->to('bookings');
    }
}
