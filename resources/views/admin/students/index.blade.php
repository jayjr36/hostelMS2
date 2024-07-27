@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Student List</h1>
            <a href="{{ route('admin.students.create') }}" class="btn btn-primary">Register New Student</a>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Registration Number</th>
                        <th>Programme Enrolled</th>
                        <th>Year of Study</th>
                        <th>Phone</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Parents/Guardian Name</th>
                        <th>Parents/Guardian Phone</th>
                        <th>Year Enrolled</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->reg_number }}</td>
                        <td>{{ $student->programme_enrolled }}</td>
                        <td>{{ $student->year_of_study }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->gender }}</td>
                        <td>{{ $student->address }}</td>
                        <td>{{ $student->parents_guardian_name }}</td>
                        <td>{{ $student->parents_guardian_phone }}</td>
                        <td>{{ $student->year_enrolled }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
