<!-- resources/views/admin/students/edit.blade.php -->

@extends('layout')

@section('content')
<div class="container">
    <h1>Edit Student</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('admin.students.update', $student->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $student->name }}">
        </div>
        <div class="form-group">
            <label for="reg_number">Registration Number</label>
            <input type="text" name="reg_number" id="reg_number" class="form-control" value="{{ $student->reg_number }}">
        </div>
        <div class="form-group">
            <label for="room_number">Room Number</label>
            <input type="text" name="room_number" id="room_number" class="form-control" value="{{ optional($student->booking)->room_number }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Student</button>
    </form>
</div>
@endsection
