<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnrollmentRequest;
use App\Models\Address;
use App\Models\Enrollment;
use App\Models\LearnerSenior;
use App\Models\ParentInformation;
use App\Models\PersonalInformation;
use App\Models\Requirement;
use App\Models\ReturningLearner;
use App\Models\SpecialNeed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{

    public function create()
    {
        // Get all image files from the public/img directory
        $imageFiles = File::files(public_path('img/carousel/'));

        // Extract file names to pass to the view
        $images = array_map(function ($file) {
            return 'img/carousel/' . $file->getFilename();
        }, $imageFiles);

        return view('home.form', [
            'countries' => ['Philippines', 'United States'],
            'images' => $images,
        ]);
    }

    public function thankYou()
    {
        return view('home.thankyou');
    }

    public function store(EnrollmentRequest $request)
    {
        try {
            // The validated data is already available through $request->validated()
            $validatedData = $request->validated();

            // Create records in a transaction
            return DB::transaction(function () use ($validatedData, $request) {
                // Create addresses
                $homeAddress = Address::firstOrCreate($validatedData['home_address']);
                $currentAddress = $validatedData['same_as_home']
                    ? $homeAddress
                    : Address::firstOrCreate($validatedData['current_address']);

                // Rest of your code remains the same...
                $personalInfo = PersonalInformation::firstOrCreate([
                    'birth_certificate_no' => $validatedData['birth_certificate_no'] ?? null,
                    'last_name' => $validatedData['last_name'],
                    'middle_name' => $validatedData['middle_name'],
                    'first_name' => $validatedData['first_name'],
                    'birth_date' => $validatedData['birth_date'],
                ], [
                    'age' => $validatedData['age'],
                    'sex' => $validatedData['sex'],
                    'birth_place' => $validatedData['birth_place'],
                    'religion' => $validatedData['religion'],
                    'mother_tongue' => $validatedData['mother_tongue'],
                    'four_ps_household_number' => $validatedData['four_ps_household_number'] ?? null,
                    'email' => $validatedData['email'], // Ensure email is passed here
                    'address_id' => $homeAddress->id,
                ]);

                $parentInfo = ParentInformation::firstOrCreate($this->getParentData($validatedData));
                $specialNeeds = SpecialNeed::firstOrCreate([
                    'type' => implode(',', $validatedData['special_needs']['type'] ?? []),
                    'with_manifestations' => implode(',', $validatedData['special_needs']['with_manifestations'] ?? []),
                    'is_have_pwd_id' => $validatedData['special_needs']['is_have_pwd_id'] ?? false,
                ]);
                $learnerSenior = LearnerSenior::firstOrCreate($validatedData['learner_senior'] ?? []);
                $returningLearner = ReturningLearner::firstOrCreate($validatedData['returning_learner'] ?? []);

                // Create enrollment with relationships
                $enrollment = Enrollment::create([
                    ...$this->getEnrollmentData($validatedData),
                    'home_address_id' => $homeAddress->id,
                    'current_address_id' => $currentAddress->id,
                    'personal_information_id' => $personalInfo->id,
                    'parent_information_id' => $parentInfo->id,
                    'special_need_id' => $specialNeeds->id,
                    'learner_senior_id' => $learnerSenior->id,
                    'returning_learner_id' => $returningLearner->id,
                ]);

                // Handle requirements
                $this->handleRequirements($request, $enrollment);

                if ($request->ajax()) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Enrollment submitted successfully',
                        'redirect' => route('form.thank-you')
                    ]);
                }

                return redirect()->route('form.thank-you')->with('success', 'Enrollment created successfully.');
            });
        } catch (\Exception $e) {
            Log::error('Form submission error', ['error' => $e->getMessage()]);

            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'An error occurred. Please try again.'
                ], 500);
            }

            return back()->withInput()->with('error', 'An error occurred. Please try again.');
        }
    }

    private function handleRequirements(Request $request, Enrollment $enrollment)
    {
        $requirementTypes = [
            'birth_certificate' => 'Birth Certificate',
            'grade_10_card' => 'Grade 10 Card'
        ];

        foreach ($requirementTypes as $field => $description) {
            if ($request->hasFile("requirements.$field")) {
                $path = $request->file("requirements.$field")->store('requirements', 'public');
                $requirement = Requirement::create([
                    'description' => $description,
                    'path' => $path
                ]);
                $enrollment->requirements()->attach($requirement->id);
            }
        }
    }

    private function createPersonalInfo(array $data, int $addressId)
    {
        return PersonalInformation::create([
            'birth_certificate_no' => $data['birth_certificate_no'] ?? null,
            'last_name' => $data['last_name'],
            'middle_name' => $data['middle_name'],
            'first_name' => $data['first_name'],
            'age' => $data['age'],
            'sex' => $data['sex'],
            'birth_place' => $data['birth_place'],
            'birth_date' => $data['birth_date'],
            'religion' => $data['religion'],
            'mother_tongue' => $data['mother_tongue'],
            'four_ps_household_number' => $data['four_ps_household_number'] ?? null,
            'address_id' => $addressId,
        ]);
    }

    private function createSpecialNeeds(array $data)
    {
        if (!($data['has_special_needs'] ?? false)) {
            return SpecialNeed::create([]);
        }

        return SpecialNeed::create([
            'type' => implode(',', $data['special_needs']['type'] ?? []),
            'with_manifestations' => implode(',', $data['special_needs']['with_manifestations'] ?? []),
            'is_have_pwd_id' => $data['special_needs']['is_have_pwd_id'] ?? false,
        ]);
    }

    private function getEnrollmentData(array $data): array
    {
        return [
            'school_year' => $data['school_year'],
            'learners_reference_no' => $data['learners_reference_no'],
            'grade_to_enroll' => $data['grade_to_enroll'],
            'distance_learning_preference' => json_encode($data['distance_learning_preference']),
        ];
    }

    private function getParentData(array $data): array
    {
        return array_intersect_key($data, array_flip([
            'father_last_name',
            'father_first_name',
            'father_middle_name',
            'father_contact_number',
            'mother_last_name',
            'mother_first_name',
            'mother_middle_name',
            'mother_contact_number',
            'legal_last_name',
            'legal_first_name',
            'legal_middle_name',
            'legal_contact_number'
        ]));
    }
}
