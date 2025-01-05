<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $teachers = Teacher::with('user')
            ->when($search, function ($query, $search) {
                return $query->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('middle_name', 'like', "%{$search}%");
            })
            ->orderBy('last_name')
            ->paginate(10);

        return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = Teacher::orderBy('created_at', 'desc')->paginate(10);
        return view('teachers.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:teachers,email',
        ]);

        Teacher::create($validated);

        return redirect()->route('teachers.create')->with('success', 'Teacher added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:teachers,email,' . $teacher->id,
        ]);

        $teacher->update($validated);

        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect()->route('teachers.index')->with('delete', 'Teacher deleted successfully.');
    }

    /**
     * Create an account for the teacher.
     *
     *  protected $fillable = [
     *  'unique_code', will be auto generated
     *  'email',
     *  'password',
     *  'role',
     *  ];
     */
    public function createAccount(Teacher $teacher)
    {
        try {
            // Check if teacher has an email
            if (!$teacher->email) {
                return redirect()->route('teachers.index')->with('delete', 'Teacher must have an email address.');
            }

            // Check if user account already exists
            if (User::where('email', $teacher->email)->exists()) {
                return redirect()->route('teachers.index')->with('delete', 'Account already exists for this teacher.');
            }

            $year = date('y');
            $lastUser = User::where('unique_code', 'like', $year . '-%')
                ->orderBy('unique_code', 'desc')
                ->first();

            if ($lastUser) {
                $lastNumber = intval(substr($lastUser->unique_code, -4));
                $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
            } else {
                $newNumber = '0001';
            }

            $uniqueCode = $year . '-' . $newNumber;

            $user = User::create([
                'email' => $teacher->email,
                'unique_code' => $uniqueCode,
                'password' => bcrypt($uniqueCode),
                'role' => 'teacher',
            ]);

            if (!$user) {
                throw new \Exception('Failed to create user account.');
            }

            return redirect()->route('teachers.index')->with('success', 'Account created successfully. Unique Code: ' . $uniqueCode);
        } catch (\Exception $e) {
            return redirect()->route('teachers.index')->with('delete', 'Error creating account: ' . $e->getMessage());
        }
    }
}
