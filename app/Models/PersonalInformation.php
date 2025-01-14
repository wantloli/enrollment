<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalInformation extends Model
{
    /** @use HasFactory<\Database\Factories\PersonalInformationFactory> */
    use HasFactory;

    protected $table = 'personal_information';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'birth_certificate_no',
        'last_name',
        'middle_name',
        'first_name',
        'extension_name',
        'age',
        'sex',
        'birth_place',
        'birth_date',
        'religion',
        'mother_tongue',
        'four_ps_household_number',
        'email',
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
