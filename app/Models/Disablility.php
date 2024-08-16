<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disablility extends Model
{
    use HasFactory;

    protected $fillable = [
        'disability_status',
        'disability_type',
    ];

}
