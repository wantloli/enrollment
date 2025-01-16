<?php

namespace App\Http\Controllers;

use App\Exports\EnrollmentsExport;
use App\Models\Enrollment;
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

        $enrollments = $query->with('personalInformation')->paginate(10)->withQueryString();
        $years = Enrollment::select('school_year')->distinct()->pluck('school_year');

        return view('enrollments.index', compact('enrollments', 'years'));
    }


    public function pending(Request $request)
    {
        $query = Enrollment::where('status', 'pending')
            ->with(['personalInformation' => function ($query) {
                $query->orderBy('last_name', 'asc');
            }]);

        // Apply search filter
        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('personalInformation', function ($q) use ($search) {
                $q->where('last_name', 'like', "%{$search}%")
                    ->orWhere('first_name', 'like', "%{$search}%")
                    ->orWhere('middle_name', 'like', "%{$search}%");
            });
        }

        // Apply school year filter
        if ($request->has('school_year') && $request->school_year != '') {
            $query->where('school_year', $request->school_year);
        }

        // Apply alphabet filter
        if ($request->has('letter') && $request->letter != '') {
            $query->whereHas('personalInformation', function ($q) use ($request) {
                $q->where('last_name', 'like', $request->letter . '%');
            });
        }

        $pendingEnrollments = $query->paginate(10)->withQueryString();
        $schoolYears = Enrollment::distinct('school_year')->pluck('school_year')->sort();

        return view('enrollments.status.pending', compact('pendingEnrollments', 'schoolYears'));
    }

    public function reviewed(Request $request)
    {
        $query = Enrollment::whereIn('status', ['reviewed'])
            ->with(['personalInformation' => function ($query) {
                $query->orderBy('last_name', 'asc');
            }]);

        // Apply search filter
        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('personalInformation', function ($q) use ($search) {
                $q->where('last_name', 'like', "%{$search}%")
                    ->orWhere('first_name', 'like', "%{$search}%")
                    ->orWhere('middle_name', 'like', "%{$search}%");
            });
        }

        // Apply school year filter
        if ($request->has('school_year') && $request->school_year != '') {
            $query->where('school_year', $request->school_year);
        }

        // Apply alphabet filter
        if ($request->has('letter') && $request->letter != '') {
            $query->whereHas('personalInformation', function ($q) use ($request) {
                $q->where('last_name', 'like', $request->letter . '%');
            });
        }

        $reviewedEnrollments = $query->paginate(10)->withQueryString();
        $schoolYears = Enrollment::distinct('school_year')->pluck('school_year')->sort();

        return view('enrollments.status.reviewed', compact('reviewedEnrollments', 'schoolYears'));
    }

    public function enrolled(Request $request)
    {
        $query = Enrollment::where('status', 'enrolled')
            ->with(['personalInformation' => function ($query) {
                $query->orderBy('last_name', 'asc');
            }]);

        // Apply search filter
        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('personalInformation', function ($q) use ($search) {
                $q->where('last_name', 'like', "%{$search}%")
                    ->orWhere('first_name', 'like', "%{$search}%")
                    ->orWhere('middle_name', 'like', "%{$search}%")
                    ->orWhere('student_id', 'like', "%{$search}%");
            });
        }

        // Apply school year filter
        if ($request->has('school_year') && $request->school_year != '') {
            $query->where('school_year', $request->school_year);
        }

        // Apply alphabet filter
        if ($request->has('letter') && $request->letter != '') {
            $query->whereHas('personalInformation', function ($q) use ($request) {
                $q->where('last_name', 'like', $request->letter . '%');
            });
        }

        $enrolledStudents = $query->paginate(10)->withQueryString();
        $schoolYears = Enrollment::distinct('school_year')->pluck('school_year')->sort();

        return view('enrollments.status.enrolled', compact('enrolledStudents', 'schoolYears'));
    }

    public function rejected(Request $request)
    {
        $query = Enrollment::with('personalInformation')
            ->where('status', 'rejected');

        // Apply search filter
        if ($request->has('search')) {
            $search = $request->get('search');
            $query->whereHas('personalInformation', function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('middle_name', 'like', "%{$search}%");
            });
        }

        // Apply school year filter
        if ($request->has('school_year') && $request->school_year !== '') {
            $query->where('school_year', $request->school_year);
        }

        // Apply letter filter
        if ($request->has('letter') && $request->letter !== '') {
            $query->whereHas('personalInformation', function ($q) use ($request) {
                $q->where('last_name', 'like', $request->letter . '%');
            });
        }

        $schoolYears = Enrollment::distinct()->pluck('school_year');
        $rejectedEnrollments = $query->latest()->paginate(10);

        return view('enrollments.status.rejected', compact('rejectedEnrollments', 'schoolYears'));
    }

    public function approve(Enrollment $enrollment)
    {
        $enrollment->update(['status' => 'approved']);
        return redirect()->back()->with('success', 'Enrollment approved successfully');
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
        //
    }

    public function export(Request $request)
    {
        $schoolYear = $request->get('export_year', 'all');
        $filename = $schoolYear === 'all' ? 'all_enrollments.xlsx' : "enrollments_{$schoolYear}.xlsx";

        return Excel::download(new EnrollmentsExport($schoolYear), $filename);
    }
}
