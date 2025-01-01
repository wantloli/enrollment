<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturningLearner extends Model
{
    /** @use HasFactory<\Database\Factories\ReturningLearnerFactory> */
    use HasFactory;

    protected $fillable = [
        'grade_level',
        'school_year',
        'school',
        'school_id',
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
