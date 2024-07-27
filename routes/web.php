<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HostelController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;


Route::get('/admin', function () {
    return view('admin');
})->name('add-hostel');

Route::get('/register', function () {
    return view('auth.register');
})->name('user.register');

Route::get('/', function () {
    return view('auth.login');
})->name('user.login');

Route::get('/landing', function () {
    return view('landing');
})->name('landing.page');

Route::get('/admin/home', function () {
    return view('admin.dashboard');
})->name('admin.home');

Route::get('/register/students', function () {
    return view('admin.students.create');
})->name('register.student');

Route::post('/add-hostel', [HostelController::class, 'store'])->name('hostels.store');
Route::get('/hostels', [HostelController::class, 'index'])->name('hostels.index');
Route::get('/hostels/{id}', [HostelController::class, 'show'])->name('hostels.show');
Route::post('/booking/{id}/payment', [BookingController::class, 'makePayment'])->name('make.payment');
Route::get('/bookings', [BookingController::class, 'userBookings'])->name('user.bookings');
Route::post('/book', [BookingController::class, 'store'])->name('store.bookings');
Route::post('/update-balance', [UserController::class,'updateBalance'],)->name('update.balance');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('bookings/create', [BookingController::class, 'create'])->name('bookings.create');
Route::post('bookings', [BookingController::class, 'store'])->name('bookings.store');
Route::get('bookings/{control_number}', [BookingController::class, 'show'])->name('bookings.show');
Route::get('students/{reg_number}', [StudentController::class, 'show']);
Route::post('students/register', [StudentController::class, 'store'])->name('admin.students.store');



Route::get('/admin/students', [AdminController::class, 'students'])->name('admin.students');
Route::get('/admin/students/edit/{id}', [AdminController::class, 'editStudent'])->name('admin.students.edit');
Route::post('/admin/students/update/{id}', [AdminController::class, 'updateStudent'])->name('admin.students.update');
Route::delete('/admin/students/delete/{id}', [AdminController::class, 'deleteStudent'])->name('admin.students.delete');
Route::get('/admin/bookings', [AdminController::class, 'viewBookings'])->name('admin.bookings');
Route::get('/student/bookings', [StudentController::class, 'viewBookings'])->name('student.bookings')->middleware('auth');
