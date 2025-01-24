<?php

namespace App\Http\Controllers;

use App\Exports\EnrollmentsExport;
use App\Models\Enrollment;
use App\Models\LearnerSenior;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Enrollment::query();

        // Always join with personal_information table for consistent sorting
        $query->join('personal_information', 'enrollments.personal_information_id', '=', 'personal_information.id')
            ->select('enrollments.*');

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('personal_information.last_name', 'like', '%' . $request->search . '%')
                    ->orWhere('personal_information.first_name', 'like', '%' . $request->search . '%')
                    ->orWhere('personal_information.middle_name', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('year')) {
            $query->where('enrollments.school_year', $request->year);
        }

        if ($request->filled('strand') && $request->strand !== 'all') {
            $query->whereHas('learnerSenior', function ($q) use ($request) {
                $q->where('strand', $request->strand);
            });
        }

        if ($request->filled('letter')) {
            $query->where('personal_information.last_name', 'like', $request->letter . '%');
        }

        // Handle sorting
        if ($request->filled('sort') && $request->filled('direction')) {
            if ($request->sort === 'last_name') {
                $query->orderBy('personal_information.last_name', $request->direction);
            } else {
                $query->orderBy('enrollments.' . $request->sort, $request->direction);
            }
        } else {
            // Default sorting by last name ascending
            $query->orderBy('personal_information.last_name', 'asc');
        }

        $enrollments = $query->with(['personalInformation', 'learnerSenior'])->paginate(10)->withQueryString();
        $years = Enrollment::select('school_year')->distinct()->pluck('school_year');
        $strands = LearnerSenior::select('strand')->distinct()->pluck('strand');

        return view('enrollments.index', compact('enrollments', 'years', 'strands'));
    }


    public function show(Enrollment $enrollment)
    {
        return view('enrollments.show', compact('enrollment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enrollment $enrollment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollment $enrollment)
    {
        try {
            $enrollment->delete();

            return redirect()->route('enrollments.index')->with('success', 'Enrollment deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('enrollments.index')->with('error', 'An error occurred while deleting the enrollment.');
        }
    }

    public function export(Request $request)
    {
        $schoolYear = $request->get('export_year', 'all');
        $strand = $request->get('export_strand', 'all');
        $filename = $schoolYear === 'all' ?
            ($strand === 'all' ? 'all_enrollments.xlsx' : "all_enrollments_{$strand}.xlsx") : ($strand === 'all' ? "enrollments_{$schoolYear}.xlsx" : "enrollments_{$schoolYear}_{$strand}.xlsx");


        return Excel::download(new EnrollmentsExport($schoolYear), $filename);
    }
}
