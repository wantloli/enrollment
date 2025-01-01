<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialNeed extends Model
{
    /** @use HasFactory<\Database\Factories\SpecialNeedFactory> */
    use HasFactory;

    protected $fillable = [
        'with_diagnosis',
        'with_manifestations',
        'is_have_pwd_id',
    ];

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
