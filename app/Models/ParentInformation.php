<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentInformation extends Model
{
    /** @use HasFactory<\Database\Factories\ParentInformationFactory> */
    use HasFactory;

    protected $fillable = [
        'father_last_name',
        'father_first_name',
        'father_middle_name',
        'father_contact_number',
        'mother_last_name',
        'mother_first_name',
        'mother_middle_name',
        'mother_contact_number',
        'legal_last_name',
        'legal_first_name',
        'legal_middle_name',
        'legal_contact_number',
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
