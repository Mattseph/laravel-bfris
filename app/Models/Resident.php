<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;

    protected $primaryKey = 'resident_id';

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
        'is_fourps',
        'is_deceased',
-       'date_of_death',
        'image',
    ];


    public function disability()
    {
        return $this->hasOne(Disability::class);
    }

    public function vaccination()
    {
        return $this->hasOne(Vaccination::class);
    }

    public function voter()
    {
        return $this->hasOne(Voter::class);
    }

    public function emergency_contact()
    {
        return $this->hasOne(Voter::class);
    }

}
