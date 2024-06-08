<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\TouristAttraction;
use App\Models\Travel;
use Carbon\Carbon;
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

        $data = $request->all();
        $data['bookingDate'] = Carbon::parse($request->bookingDate)->format('Y-m-d H:i:s');

        Booking::create($data);

        return redirect()->to('bookings');
    }

    public function edit(Booking $booking)
    {
        return view('booking.edit', [
            'title' => 'Edit Booking',
            'travels' => Travel::all(),
            'tourists' => TouristAttraction::all(),
            'booking' => $booking
        ]);
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'bookingDate' => 'required|date',
            'attractionId' => 'required',
            'travelId' => 'required',
            'totalAmount' => 'required|numeric'
        ]);

        $data = $request->all();
        $data['bookingDate'] = Carbon::parse($request->bookingDate)->format('Y-m-d H:i:s');

        $booking->update($data);

        return redirect()->to('bookings');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->to('bookings');
    }
}
