<?php

namespace App\Exports;

use App\Models\Enrollment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EnrollmentsExport implements FromCollection, WithHeadings, WithMapping
{
    protected $schoolYear;

    public function __construct($schoolYear = 'all')
    {
        $this->schoolYear = $schoolYear;
    }

    public function collection()
    {
        $query = Enrollment::with('personalInformation');

        if ($this->schoolYear !== 'all') {
            $query->where('school_year', $this->schoolYear);
        }

        return $query->get();
    }

    public function map($enrollment): array
    {
        return [
            $enrollment->personalInformation->last_name,
            $enrollment->personalInformation->first_name,
            $enrollment->personalInformation->middle_name,
            $enrollment->school_year,
            strtoupper($enrollment->status),
        ];
    }

    public function headings(): array
    {
        return [
            'Last Name',
            'First Name',
            'Middle Name',
            'School Year',
            'Status',
        ];
    }
}
