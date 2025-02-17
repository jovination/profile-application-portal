<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = ['profile_id', 'skill_name'];

    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
