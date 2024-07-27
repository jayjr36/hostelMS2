@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1>Book a Room</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('bookings.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="hostel">Hostel</label>
                    <select name="hostel" class="form-control">
                        <option value="">None</option>
                        <option value="block1">Block I</option>
                        <option value="block2">Block II</option>
                        <option value="block3">Block III</option>
                        <option value="block4">Block IV</option>
                        <option value="block5">Block V</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="reg_number">Registration Number</label>
                    <input type="text" name="reg_number" id="reg_number" class="form-control" required>
                </div>
                <button type="button" class="btn btn-primary" onclick="fetchStudentDetails()">Fetch Details</button>
                <div id="student-details" style="display: none;">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="programme_enrolled">Programme Enrolled</label>
                        <input type="text" id="programme_enrolled" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="year_of_study">Year of Study</label>
                        <input type="text" id="year_of_study" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <input type="text" id="gender" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" id="address" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="parents_guardian_name">Parents/Guardian Name</label>
                        <input type="text" id="parents_guardian_name" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="parents_guardian_phone">Parents/Guardian Phone</label>
                        <input type="text" id="parents_guardian_phone" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="disability">Disability</label>
                        <select name="disability" class="form-control">
                            <option value="none">None</option>
                            <option value="visual">Visual Impairment</option>
                            <option value="hearing">Hearing Impairment</option>
                            <option value="physical">Physical Disability</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="duration">Duration</label>
                        <select name="duration" class="form-control" required>
                            <option value="semester">50000 Tshs per Semester</option>
                            <option value="year">100000 Tshs per Year</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Book Room</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function fetchStudentDetails() {
        const regNumber = document.getElementById('reg_number').value;
        fetch(`/students/${regNumber}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('name').value = data.name;
                document.getElementById('programme_enrolled').value = data.programme_enrolled;
                document.getElementById  ('year_of_study').value = data.year_of_study;
                    document.getElementById('gender').value = data.gender;
                    document.getElementById('phone').value = data.phone;
                    document.getElementById('address').value = data.address;
                    document.getElementById('parents_guardian_name').value = data.parents_guardian_name;
                    document.getElementById('parents_guardian_phone').value = data.parents_guardian_phone;
                    document.getElementById('student-details').style.display = 'block';
                })
                .catch(error => {
                    console.error('Error fetching student details:', error);
                    alert('Failed to fetch student details. Please check the registration number.');
                });
        }
    </script>
    @endsection
