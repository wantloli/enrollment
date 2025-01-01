<?php

namespace App\Http\Controllers;

use App\Models\EnrollmentPeriod;
use Illuminate\Http\Request;

class EnrollmentPeriodController extends Controller
{
    public function update(Request $request, EnrollmentPeriod $enrollmentPeriod)
    {
        $validatedData = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'is_active' => 'required|boolean',
        ]);

        $enrollmentPeriod->update($validatedData);

        return redirect()->route('admin.index')->with('success', 'Enrollment period updated successfully.');
    }
}
