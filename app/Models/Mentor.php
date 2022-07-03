<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    protected $casts = [
        'mentees'=>'array'
    ];

    use HasFactory;
}
