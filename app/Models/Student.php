<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'reg_number',
        'programme_enrolled',
        'year_of_study',
        'phone',
        'gender',
        'address',
        'parents_guardian_name',
        'parents_guardian_phone',
        'year_enrolled',
    ];

    public function booking()
    {
        return $this->hasOne(Booking::class);
    }
}
