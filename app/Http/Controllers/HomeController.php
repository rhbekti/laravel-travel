<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\TouristAttraction;

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

        return view('detail', [
            'tourist' => $touristAttraction,
            'bookings' => $bookings
        ]);
    }

    public function checkout(Booking $booking)
    {
        return view('checkout', [
            'booking' => $booking
        ]);
    }

    public function cart()
    {
        $bookings = Payment::getDataByUserId(auth()->user()->id);

        return view('cart', [
            'carts' => $bookings
        ]);
    }
}
