<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voter extends Model
{
    use HasFactory;

    protected $fillable = [
        'voter_status',
        'voter_id',
        'precinct',
    ];

    public function resident ()
    {
        return $this->belongsTo(Resident::class);
    }

}
