@extends('layout')

@section('content')
<div class="container my-4">
    <h4 class="text-center mb-4">Hostels</h4>
    <div class="row">
        @foreach($hostels as $hostel)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('storage/' . $hostel->image) }}" class="card-img-top" alt="Hostel Image">
                <div class="card-body">
                    <h5 class="card-title">{{ $hostel->name }}</h5>
                    <p class="card-text"><strong>Location:</strong> {{ $hostel->location }}</p>
                    <p class="card-text">{{ $hostel->description }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="text-center mt-4">
        <a href="{{ route('bookings.create') }}" class="btn btn-success btn-lg">Book a Room</a>
    </div>
</div>
@endsection
