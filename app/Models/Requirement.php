<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    /** @use HasFactory<\Database\Factories\RequirementFactory> */
    use HasFactory;

    protected $fillable = [
        'description',
        'path',
    ];

    public function enrollments()
    {
        return $this->belongsToMany(Enrollment::class, 'enrollment_requirement');
    }
}
