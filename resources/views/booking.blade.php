<!-- resources/views/student/bookings/index.blade.php -->

@extends('layout')

@section('content')
<div class="container">
    <h3 class="text-center">Bookings</h3>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if ($bookings->isEmpty())
        <p>You have no bookings yet.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Booking ID</th>
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
                        <td>{{ $booking->room_number }}</td>
                        <td>{{ $booking->disability }}</td>
                        <td>{{ $booking->duration }}</td>
                        <td>{{ $booking->control_number }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection

















{{-- @extends('layout')

@section('content')
    <div class="container">
        @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @elseif(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
        <h1>Your Bookings</h1>
        <div class="row">
            @foreach ($bookings as $booking)
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">{{ $booking->hostel_name }}</h5>
                            <p class="card-text">Duration: {{ $booking->duration }}</p>
                            <p class="card-text">Price: {{ $booking->price }}</p>
                            <p class="card-text">Room Number: {{ $booking->room_number }}</p>
                            <p class="card-text">Payment status: {{ $booking->payment_status }}</p>
                            @if ($booking->payment_status != 'paid')
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#paymentModal{{ $booking->id }}">
                                    Make Payment
                                </button>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Payment Modal -->
                <div class="modal fade" id="paymentModal{{ $booking->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="paymentModalLabel{{ $booking->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="paymentModalLabel{{ $booking->id }}">Make Payment</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @if (session('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                <form id="paymentForm{{ $booking->id }}"
                                    action="{{ route('make.payment', ['id' => $booking->id]) }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="paymentAmount{{ $booking->id }}" class="form-label">Payment
                                            Amount</label>
                                        <input type="number" class="form-control" id="paymentAmount{{ $booking->id }}"
                                            name="payment_amount" placeholder="Enter payment amount">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit Payment</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection --}}