<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkExperience extends Model
{
    use HasFactory;

    protected $fillable = ['profile_id', 'company_name', 'role', 'duration'];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
