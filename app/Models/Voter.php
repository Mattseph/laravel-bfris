<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    use HasFactory;

    protected $fillable = [
        'resident_id',
        'voter_number',
        'is_voter',
        'precinct',
    ];

    public function resident ()
    {
        return $this->belongsTo(Resident::class);
    }

}
