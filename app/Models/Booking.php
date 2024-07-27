<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'disability',
        'duration',
        'room_number',
        'hostel',
        'control_number',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
