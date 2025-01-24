<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\User;
use Illuminate\Http\Request;

class EnrollmentStatusController extends Controller
{
    public function markRejected(Enrollment $enrollment)
    {
        $enrollment->update(['status' => 'rejected']);
        return redirect()->back()->with('success', 'Enrollment rejected successfully');
    }

    public function markReviewed(Enrollment $enrollment)
    {
        // Update the enrollment status to 'reviewed'
        $enrollment->update(['status' => 'reviewed']);

        // Create an account for the enrollee if it doesn't already exist
        $personalInfo = $enrollment->personalInformation;

        if (!$personalInfo || !$personalInfo->email) {
            return redirect()->route('enrollments.pending')->with('error', 'Enrollee must have a valid email address.');
        }

        if (User::where('email', $personalInfo->email)->exists()) {
            return redirect()->route('enrollments.pending')->with('error', 'An account already exists for this enrollee.');
        }

        try {
            // Generate a unique code
            $year = date('y');
            $lastUser = User::where('unique_code', 'like', $year . '-%')
                ->orderBy('unique_code', 'desc')
                ->first();

            $newNumber = $lastUser
                ? str_pad((int)substr($lastUser->unique_code, -4) + 1, 4, '0', STR_PAD_LEFT)
                : '0001';

            $uniqueCode = $year . '-' . $newNumber;

            // Create the user account
            $user = User::create([
                'email' => $personalInfo->email,
                'unique_code' => $uniqueCode,
                'password' => bcrypt($uniqueCode),
                'role' => 'student',
            ]);

            if (!$user) {
                throw new \Exception('Failed to create user account.');
            }

            return redirect()->route('enrollments.pending')->with(
                'success',
                'Enrollment marked as reviewed, and account created successfully. Unique Code: ' . $uniqueCode
            );
        } catch (\Exception $e) {
            return redirect()->route('enrollments.pending')->with(
                'error',
                'Error creating account: ' . $e->getMessage()
            );
        }
    }

    public function approve(Enrollment $enrollment)
    {
        $enrollment->update(['status' => 'approved']);
        return redirect()->back()->with('success', 'Enrollment approved successfully');
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
}
