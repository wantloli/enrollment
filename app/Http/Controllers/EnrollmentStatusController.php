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
}
