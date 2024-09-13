<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'resident_id',
        'name',
        'relationship',
        'address',
        'contact',
    ];

    public function resident ()
    {
        return $this->belongsTo(Resident::class);
    }

}
