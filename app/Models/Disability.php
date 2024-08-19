<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disability extends Model
{
    use HasFactory;

    protected $fillable = [
        'disability_status',
        'disability_type',
    ];

    public function resident ()
    {
        return $this->belongsTo(Resident::class);
    }

}
