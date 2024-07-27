@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Register Student</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.students.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="reg_number">Registration Number</label>
                    <input type="text" name="reg_number" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="programme_enrolled">Programme Enrolled</label>
                    <input type="text" name="programme_enrolled" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="year_of_study">Year of Study</label>
                    <input type="number" name="year_of_study" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="" disabled selected>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="address">Address</label>
                    <textarea name="address" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="parents_guardian_name">Parents/Guardian Name</label>
                    <input type="text" name="parents_guardian_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="parents_guardian_phone">Parents/Guardian Phone</label>
                    <input type="text" name="parents_guardian_phone" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="year_enrolled">Year Enrolled</label>
                    <input type="number" name="year_enrolled" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
</div>
@endsection
