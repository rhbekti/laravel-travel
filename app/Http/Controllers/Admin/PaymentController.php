<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PaymentController extends Controller
{
    public function index()
    {
        return view('payment.index', [
            'title' => 'Payment',
            'payments' => Payment::latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'bookingId' => 'required',
            'paymentMethod' => 'required'
        ]);

        $booking = Booking::find($request->bookingId);

        $data = [
            'userId' => auth()->user()->id,
            'bookingId' => $booking->id,
            'paymentMethod' => $request->paymentMethod,
            'amount' => $booking->totalAmount,
            'status' => 0
        ];

        Payment::create($data);

        return redirect()->to('/');
    }

    public function update(Payment $payment)
    {
        $payment->update([
            'paymentDate' => Carbon::now(),
            'status' => 1
        ]);

        return redirect()->to('payments');
    }

    public function destroy(Payment $payment)
    {
        $payment->update([
            'paymentDate' => Carbon::now(),
            'status' => 3
        ]);

        return redirect()->to('payments');
    }
}
