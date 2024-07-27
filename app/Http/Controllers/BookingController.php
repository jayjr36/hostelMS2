<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Student;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create()
    {
        return view('bookings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'hostel' => 'required|string',
            'reg_number' => 'required|exists:students,reg_number',
            'disability' => 'nullable|string',
            'duration' => 'required|in:semester,year',
        ]);
    
        $student = Student::where('reg_number', $request->reg_number)->first();
    
        // Check gender and hostel block compatibility
        $validHostelsForMale = ['block1', 'block3', 'block5'];
        $validHostelsForFemale = ['block2', 'block4'];
    
        if (($student->gender == 'male' && !in_array($request->hostel, $validHostelsForMale)) ||
            ($student->gender == 'female' && !in_array($request->hostel, $validHostelsForFemale))) {
            return back()->withErrors(['hostel' => 'Selected hostel block is not allowed for your gender.']);
        }
    
        $room_number = $this->assignRoom($student->gender);
    
        if (!$room_number) {
            return back()->withErrors(['room' => 'No rooms available.']);
        }
    
        $control_number = $this->generateControlNumber();
    
        Booking::create([
            'student_id' => $student->id,
            'disability' => $request->disability,
            'duration' => $request->duration,
            'room_number' => $room_number,
            'hostel' =>$request->hostel,
            'control_number' => $control_number,
        ]);
    
        return redirect()->route('bookings.show', $control_number)->with('success', 'Room booked successfully.');
    }    
    
    private function assignRoom($gender)
    {
          $allRooms = range(1, 100);
    
             shuffle($allRooms);
    
              foreach ($allRooms as $room) {
            $currentOccupancy = Booking::where('room_number', $room)->count();
            if ($currentOccupancy < 4) {
                return $room;
            }
        }
    
              return false;
    }
    

    private function generateControlNumber()
    {
        do {
            $control_number = str_pad(mt_rand(0, 9999999999), 10, '0', STR_PAD_LEFT);
        } while (Booking::where('control_number', $control_number)->exists());

        return $control_number;
    }

    public function show($control_number)
    {
        $booking = Booking::where('control_number', $control_number)->firstOrFail();
        return view('bookings.show', compact('booking'));
    }
}
