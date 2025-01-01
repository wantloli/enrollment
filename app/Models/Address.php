<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /** @use HasFactory<\Database\Factories\AddressFactory> */
    use HasFactory;

    protected $fillable = [
        'house_no',
        'street_name',
        'barangay',
        'municipality',
        'province',
        'country'
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
