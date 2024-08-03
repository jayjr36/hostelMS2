<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('admin.students.index', compact('students'));
    }

    public function viewBookings()
    {
        // Get the currently authenticated user
        $user = Auth::user();
    
        // Fetch the student's record using the reg_number
        $student = Student::where('reg_number', $user->reg_number)->firstOrFail();
    
        // Fetch bookings for the student based on reg_number
        $bookings = Booking::where('student_id', $student->id)->get();
    
        return view('booking', compact('bookings'));
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'reg_number' => 'required|unique:students',
            'programme_enrolled' => 'required',
            'year_of_study' => 'required|integer',
            'phone' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'parents_guardian_name' => 'required',
            'parents_guardian_phone' => 'required',
        ]);

        Student::create($request->all());

        return redirect()->route('admin.students')->with('success', 'Student registered successfully.');
    }

    public function show($reg_number)
    {
        $student = Student::where('reg_number', $reg_number)->firstOrFail();

        return response()->json($student);
    }
}
