<!-- resources/views/admin/bookings/index.blade.php -->

@extends('layout')

@section('content')
<div class="container">
    <h3 class="text-center">All Hostel Bookings</h3>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Student Name</th>
                <th>Registration Number</th>
                <th>Room Number</th>
                <th>Disability</th>
                <th>Duration</th>
                <th>Control Number</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->student->name }}</td>
                    <td>{{ $booking->student->reg_number }}</td>
                    <td>{{ $booking->room_number }}</td>
                    <td>{{ $booking->disability }}</td>
                    <td>{{ $booking->duration }}</td>
                    <td>{{ $booking->control_number }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
