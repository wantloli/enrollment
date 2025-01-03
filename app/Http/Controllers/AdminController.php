<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\EnrollmentPeriod;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $currentPeriod = EnrollmentPeriod::where('is_active', true)->first();
        $enrollmentCount = Enrollment::count();

        return view('admin.index', compact('currentPeriod', 'enrollmentCount'));
    }
}
