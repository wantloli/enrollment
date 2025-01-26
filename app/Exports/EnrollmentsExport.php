<?php

namespace App\Exports;

use App\Models\Enrollment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class EnrollmentsExport implements FromCollection, WithHeadings, WithMapping, WithStyles
{
    protected $schoolYear;
    protected $strand;

    public function __construct($schoolYear = 'all', $strand = 'all')
    {
        $this->schoolYear = $schoolYear;
        $this->strand = $strand;
    }

    public function collection()
    {
        $query = Enrollment::with(['personalInformation', 'learnerSenior', 'currentAddress']);

        // Filter by school year if specified
        if ($this->schoolYear !== 'all') {
            $query->where('school_year', $this->schoolYear);
        }

        // Filter by strand if specified
        if ($this->strand !== 'all') {
            $query->whereHas('learnerSenior', function ($q) {
                $q->where('strand', $this->strand);
            });
        }

        return $query->get();
    }

    public function map($enrollment): array
    {
        return [
            $enrollment->personalInformation->last_name ?? '',
            $enrollment->personalInformation->first_name ?? '',
            $enrollment->personalInformation->middle_name ?? '',
            "'" . $enrollment->learners_reference_no, // Add a single quote to treat as a string in Excel
            $enrollment->personalInformation->sex ?? '',
            $enrollment->personalInformation->age ?? '',
            $enrollment->currentAddress ?
                $enrollment->currentAddress->barangay . ', ' . $enrollment->currentAddress->municipality : 'N/A', // Format the address
            $enrollment->school_year,
            $enrollment->learnerSenior->strand ?? 'N/A',
        ];
    }

    public function headings(): array
    {
        return [
            'Last Name',
            'First Name',
            'Middle Name',
            'LRN',
            'Gender',
            'Age',
            'Address',
            'School Year',
            'Strand',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // Auto-size columns
        foreach (range('A', $sheet->getHighestColumn()) as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        return [];
    }
}
