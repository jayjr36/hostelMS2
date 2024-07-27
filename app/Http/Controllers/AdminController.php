<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Booking;


class AdminController extends Controller
{
    // app/Http/Controllers/AdminController.php
public function students()
{
    $students = Student::with('booking')->get();
    return view('admin.managestudents', compact('students'));
}

public function editStudent($id)
{
    $student = Student::with('booking')->findOrFail($id);
    return view('admin.students.edit', compact('student'));
}

public function updateStudent(Request $request, $id)
{
    $student = Student::findOrFail($id);
    $student->update($request->all());

    $booking = Booking::where('student_id', $id)->first();
    if ($booking) {
        $booking->update(['room_number' => $request->room_number]);
    }

    return redirect()->route('admin.students')->with('success', 'Student updated successfully');
}

public function deleteStudent($id)
{
    $student = Student::findOrFail($id);
    Booking::where('student_id', $id)->delete();
    $student->delete();

    return redirect()->route('admin.students')->with('success', 'Student deleted successfully');
}

public function viewBookings()
{
    $bookings = Booking::with('student')->get();
    return view('admin.bookings.index', compact('bookings'));
}

}
