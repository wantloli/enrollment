<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    /** @use HasFactory<\Database\Factories\EnrollmentFactory> */
    use HasFactory;

    protected $fillable = [
        'school_year',
        'learners_reference_no',
        'grade_to_enroll',
        'personal_information_id',
        'address_id',
        'parent_information_id',
        'special_need_id',
        'returning_learner_id',
        'learners_senior_id',
        'distance_learning_preference',
    ];

    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function parentInformation()
    {
        return $this->belongsTo(ParentInformation::class);
    }

    public function specialNeed()
    {
        return $this->belongsTo(SpecialNeed::class);
    }

    public function returningLearner()
    {
        return $this->belongsTo(ReturningLearner::class);
    }

    public function learnerSenior()
    {
        return $this->belongsTo(learnerSenior::class);
    }

    public function requirements()
    {
        return $this->belongsToMany(Requirement::class, 'enrollment_requirement');
    }
}
