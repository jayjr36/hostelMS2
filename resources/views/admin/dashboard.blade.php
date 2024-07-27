<!-- resources/views/admin/index.blade.php -->
@extends('layout')

@section('content')
<div class="container-fluid" style="padding-top: 20px;">
    <div class="row">
        <div class="col-md-3 bg-secondary">

            <h4 class="text-center py-3 text-white">HOSTEL MANAGEMENT SYSTEM</h4>
            <div class="list-group px-2 pt-5">
                <a href="{{ route('admin.students') }}" class="list-group-item list-group-item-action bg-primary text-white" target="frame">Manage Students</a>
                <a href="{{ route('register.student') }}" class="list-group-item list-group-item-action bg-primary text-white" target="frame">Register Student</a>
                <a href="{{ route('add-hostel') }}" class="list-group-item list-group-item-action bg-primary text-white" target="frame">Add Hostel</a>
                <a href="{{ route('admin.bookings') }}" class="list-group-item list-group-item-action bg-primary text-white" target="frame">Bookings</a>
                
                @auth
                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="list-group-item list-group-item-action text-danger bg-warning">Logout</button>
                </form>
                @endauth
            </div>
        </div>
        <div class="col-md-9">
            <iframe name="frame" id="contentFrame" src="{{ route('admin.students') }}" style="width: 100%; height: 600px; border: none;"></iframe>
        </div>
    </div>
</div>

<script>
    function loadContent(content) {
        document.getElementById('contentFrame').src = '/admin/' + content;
    }
</script>
@endsection
