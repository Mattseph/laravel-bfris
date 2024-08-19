<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaccination extends Model
{
    use HasFactory;

    protected $fillable = [
        'vaccine_status',
        'vaccine_1',
        'vaccine_1_date',
        'vaccine_2',
        'vaccine_2_date',
        'booster_status',
        'booster_1',
        'booster_1_date',
        'booster_2',
        'booster_2_date',
    ];

    public function resident ()
    {
        return $this->belongsTo(Resident::class);
    }

}
