<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function userBookings()
    {
        $userId = Auth::id();
        $bookings = Booking::where('user_id', $userId)->get();
        return view('booking', compact('bookings'));
    }
    public function store(Request $request)
    {
        $userId = Auth::id();

        $booking = new Booking();
        $booking->user_id = $userId;
        $booking->hostel_name = $request->hostel_name;
        $booking->home_address = $request->homeAddress;
        $booking->guardian_name = $request->guardianName;
        $booking->guardian_contact = $request->guardianContact;
        $booking->relationship = $request->relationship;
        $booking->duration = $request->duration;
        $booking->price = $request->price;
        $booking->room_number = $request->roomNumber;

        // Save the booking to the database
        $booking->save();
        
        // Optionally, you can return a response indicating success or failure
        return response()->json(['message' => 'Booking confirmed'], 200);
    }

    public function makePayment(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $paymentAmount = $request->input('payment_amount');
        $balance = $booking->price - $paymentAmount;
    
        if ($paymentAmount <= 0) {
            return redirect()->back()->with('error', 'Payment amount must be greater than 0!');
        }
    
        if ($balance < 0) {
            return redirect()->back()->with('error', 'Insufficient funds!');
        }
    
        if ($booking->price == $paymentAmount) {
            $booking->payment_status = 'paid';
        } else {
            return redirect()->back()->with('error', 'Incomplete transaction');
        }
    
        $booking->save();
    
        return redirect()->back()->with('success', 'Payment submitted successfully!');
    }
}