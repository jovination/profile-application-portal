<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationHistory extends Model
{
    use HasFactory;

    protected $fillable = ['profile_id', 'institution_name', 'degree', 'year'];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
