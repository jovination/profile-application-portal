<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'full_name',
        'phone_number',
        'email',
        'education',
        'work',
        'skills'
    ];

    protected $casts = [
        'education' => 'array',
        'work' => 'array',
        'skills' => 'array'
    ];
}