<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LearnerSenior extends Model
{
    /** @use HasFactory<\Database\Factories\LearnerSeniorFactory> */
    use HasFactory;

    protected $fillable = [
        'semester',
        'track',
        'strand',
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class, 'learner_senior_id');
    }
}
