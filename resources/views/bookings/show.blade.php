@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h3>Booking Confirmation</h3>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <p><strong>Student Name:</strong> {{ $booking->student->name }}</p>
            <p><strong>Hostel:</strong> {{ $booking->hostel }}</p>
            <p><strong>Room Number:</strong> {{ $booking->room_number }}</p>
            <p><strong>Control Number:</strong> {{ $booking->control_number }}</p>
            <p><strong>Duration:</strong> {{ $booking->duration == 'semester' ? '50000 Tshs per Semester' : '100000 Tshs per Year' }}</p>
        </div>
    </div>
</div>
@endsection