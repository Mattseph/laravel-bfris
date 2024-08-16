<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;

    protected $fillable = [
        'lastname',
        'firstname',
        'midname',
        'suffix',
        'sex',
        'date_of_birth',
        'place_of_birth',
        'civil_status',
        'nationality',
        'occupation',
        'religion',
        'blood_type',
        'educational_attainment',
        'phone_number',
        'tel_number',
        'email',
        'purok',
        'barangay',
        'city',
        'province',
        'fourps_status',
        'date_of_death',
        'image',
    ];
}
