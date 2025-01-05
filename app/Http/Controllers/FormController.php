<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Enrollment;
use App\Models\LearnerSenior;
use App\Models\ParentInformation;
use App\Models\PersonalInformation;
use App\Models\Requirement;
use App\Models\ReturningLearner;
use App\Models\SpecialNeed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FormController extends Controller
{
    private const NAME_REGEX = '/^[a-zA-Z\s\-]+$/';
    public function create()
    {
        $countries = [
            'Afghanistan',
            'Albania',
            'Algeria',
            'Andorra',
            'Angola',
            'Antigua and Barbuda',
            'Argentina',
            'Armenia',
            'Australia',
            'Austria',
            'Azerbaijan',
            'Bahamas',
            'Bahrain',
            'Bangladesh',
            'Barbados',
            'Belarus',
            'Belgium',
            'Belize',
            'Benin',
            'Bhutan',
            'Bolivia',
            'Bosnia and Herzegovina',
            'Botswana',
            'Brazil',
            'Brunei',
            'Bulgaria',
            'Burkina Faso',
            'Burundi',
            'Cabo Verde',
            'Cambodia',
            'Cameroon',
            'Canada',
            'Central African Republic',
            'Chad',
            'Chile',
            'China',
            'Colombia',
            'Comoros',
            'Congo, Democratic Republic of the',
            'Congo, Republic of the',
            'Costa Rica',
            'Croatia',
            'Cuba',
            'Cyprus',
            'Czech Republic',
            'Denmark',
            'Djibouti',
            'Dominica',
            'Dominican Republic',
            'Ecuador',
            'Egypt',
            'El Salvador',
            'Equatorial Guinea',
            'Eritrea',
            'Estonia',
            'Eswatini',
            'Ethiopia',
            'Fiji',
            'Finland',
            'France',
            'Gabon',
            'Gambia',
            'Georgia',
            'Germany',
            'Ghana',
            'Greece',
            'Grenada',
            'Guatemala',
            'Guinea',
            'Guinea-Bissau',
            'Guyana',
            'Haiti',
            'Honduras',
            'Hungary',
            'Iceland',
            'India',
            'Indonesia',
            'Iran',
            'Iraq',
            'Ireland',
            'Israel',
            'Italy',
            'Jamaica',
            'Japan',
            'Jordan',
            'Kazakhstan',
            'Kenya',
            'Kiribati',
            'Korea, North',
            'Korea, South',
            'Kosovo',
            'Kuwait',
            'Kyrgyzstan',
            'Laos',
            'Latvia',
            'Lebanon',
            'Lesotho',
            'Liberia',
            'Libya',
            'Liechtenstein',
            'Lithuania',
            'Luxembourg',
            'Madagascar',
            'Malawi',
            'Malaysia',
            'Maldives',
            'Mali',
            'Malta',
            'Marshall Islands',
            'Mauritania',
            'Mauritius',
            'Mexico',
            'Micronesia',
            'Moldova',
            'Monaco',
            'Mongolia',
            'Montenegro',
            'Morocco',
            'Mozambique',
            'Myanmar',
            'Namibia',
            'Nauru',
            'Nepal',
            'Netherlands',
            'New Zealand',
            'Nicaragua',
            'Niger',
            'Nigeria',
            'North Macedonia',
            'Norway',
            'Oman',
            'Pakistan',
            'Palau',
            'Palestine',
            'Panama',
            'Papua New Guinea',
            'Paraguay',
            'Peru',
            'Philippines',
            'Poland',
            'Portugal',
            'Qatar',
            'Romania',
            'Russia',
            'Rwanda',
            'Saint Kitts and Nevis',
            'Saint Lucia',
            'Saint Vincent and the Grenadines',
            'Samoa',
            'San Marino',
            'Sao Tome and Principe',
            'Saudi Arabia',
            'Senegal',
            'Serbia',
            'Seychelles',
            'Sierra Leone',
            'Singapore',
            'Slovakia',
            'Slovenia',
            'Solomon Islands',
            'Somalia',
            'South Africa',
            'South Sudan',
            'Spain',
            'Sri Lanka',
            'Sudan',
            'Suriname',
            'Sweden',
            'Switzerland',
            'Syria',
            'Taiwan',
            'Tajikistan',
            'Tanzania',
            'Thailand',
            'Timor-Leste',
            'Togo',
            'Tonga',
            'Trinidad and Tobago',
            'Tunisia',
            'Turkey',
            'Turkmenistan',
            'Tuvalu',
            'Uganda',
            'Ukraine',
            'United Arab Emirates',
            'United Kingdom',
            'United States',
            'Uruguay',
            'Uzbekistan',
            'Vanuatu',
            'Vatican City',
            'Venezuela',
            'Vietnam',
            'Yemen',
            'Zambia',
            'Zimbabwe'
        ];

        return view('home.form', compact('countries'));
    }

    public function thankYou()
    {
        return view('home.thankyou');
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'school_year' => 'required|string|max:255',
                'learners_reference_no' => 'required|string|max:255',
                'grade_to_enroll' => 'required|string|max:255',

                //personal information fields
                'birth_certificate_no' => 'nullable|string|max:255',
                'last_name' => 'required|string|max:255|regex:' . self::NAME_REGEX,
                'middle_name' => 'required|string|max:255|regex:' . self::NAME_REGEX,
                'first_name' => 'required|string|max:255|regex:' . self::NAME_REGEX,
                'age' => 'required|integer|min:1',
                'age' => 'required|integer',
                'sex' => 'required|string|max:255',
                'birth_place' => 'required|string|max:255',
                'birth_date' => 'required|date',
                'religion' => 'required|string|max:255',
                'mother_tongue' => 'required|string|max:255',
                'four_ps_household_number' => 'nullable|string|max:255',

                'distance_learning_preference' => 'required|string|max:255',

                // Home address fields
                'home_address.house_no' => 'required|string|max:255',
                'home_address.street_name' => 'required|string|max:255',
                'home_address.province' => 'required|string|max:255',
                'home_address.municipality' => 'required|string|max:255',
                'home_address.barangay' => 'required|string|max:255',
                'home_address.country' => 'required|string|max:255',
                'home_address.zip_code' => 'required|string|max:255',

                // Current address fields
                'current_address.house_no' => 'required_unless:same_as_home,1|string|max:255',
                'current_address.street_name' => 'required_unless:same_as_home,1|string|max:255',
                'current_address.province' => 'required_unless:same_as_home,1|string|max:255',
                'current_address.municipality' => 'required_unless:same_as_home,1|string|max:255',
                'current_address.barangay' => 'required_unless:same_as_home,1|string|max:255',
                'current_address.country' => 'required_unless:same_as_home,1|string|max:255',
                'current_address.zip_code' => 'required_unless:same_as_home,1|string|max:255',

                'same_as_home' => 'boolean',

                //parent information fields
                'father_last_name' => 'required|string|max:255',
                'father_first_name' => 'required|string|max:255',
                'father_middle_name' => 'nullable|string|max:255',
                'father_contact_number' => 'nullable|string|max:255',
                'mother_last_name' => 'required|string|max:255',
                'mother_first_name' => 'required|string|max:255',
                'mother_middle_name' => 'nullable|string|max:255',
                'mother_contact_number' => 'nullable|string|max:255',
                'legal_last_name' => 'nullable|string|max:255',
                'legal_first_name' => 'nullable|string|max:255',
                'legal_middle_name' => 'nullable|string|max:255',
                'legal_contact_number' => 'nullable|string|max:255',

                //special needs fields
                'special_needs.description' => 'nullable|string|max:255',
                'special_needs.with_diagnosis' => 'nullable|string|max:255',
                'special_needs.with_manifestations' => 'nullable|string|max:255',
                'special_needs.is_have_pwd_id' => 'boolean',

                //learner senior fields
                'learner_senior.semester' => 'required|string|max:255',
                'learner_senior.track' => 'required|string|max:255',
                'learner_senior.strand' => 'required|string|max:255',

                //returning learner fields
                'returning_learner.grade_level' => 'nullable|string|max:255',
                'returning_learner.school_year' => 'nullable|string|max:255',
                'returning_learner.school' => 'nullable|string|max:255',
                'returning_learner.school_id' => 'nullable|string|max:255',

                //requirements fields
                'requirements.birth_certificate' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'requirements.grade_10_card' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            Log::info('Validation passed.', ['validatedData' => $validatedData]);

            $personalInformationData = array_diff_key($validatedData, array_flip([
                'school_year',
                'learners_reference_no',
                'grade_to_enroll',
                'distance_learning_preference',
                'home_address.house_no',
                'home_address.street_name',
                'home_address.province',
                'home_address.municipality',
                'home_address.barangay',
                'home_address.zip_code',
                'home_address.country',
                'current_address.house_no',
                'current_address.street_name',
                'current_address.province',
                'current_address.municipality',
                'current_address.barangay',
                'current_address.zip_code',
                'current_address.country',
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
                'legal_contact_number',
                'special_needs.description',
                'special_needs.with_diagnosis',
                'special_needs.with_manifestations',
                'special_needs.is_have_pwd_id',
                'learner_senior.semester',
                'learner_senior.track',
                'learner_senior.strand',
                'returning_learner.grade_level',
                'returning_learner.school_year',
                'returning_learner.school',
                'returning_learner.school_id',
                'requirements.birth_certificate',
                'requirements.grade_10_card'
            ]));

            // Create home address
            $homeAddress = Address::create($validatedData['home_address']);
            Log::info('Home address created.', ['homeAddress' => $homeAddress]);

            // Handle current address based on same_as_home checkbox
            if (!empty($validatedData['same_as_home'])) {
                $currentAddress = $homeAddress;
            } else {
                $currentAddress = Address::create($validatedData['current_address']);
            }
            Log::info('Current address processed.', ['currentAddress' => $currentAddress]);

            // Add both address IDs to the enrollment data
            $validatedData['home_address_id'] = $homeAddress->id;
            $validatedData['current_address_id'] = $currentAddress->id;

            $personalInformationData['address_id'] = $homeAddress->id;
            $personalInformation = PersonalInformation::create($personalInformationData);
            Log::info('Personal information created.', ['personalInformation' => $personalInformation]);

            $parentInformationData = array_intersect_key($validatedData, array_flip([
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
                'legal_contact_number'
            ]));

            $parentInformation = ParentInformation::create($parentInformationData);
            $specialNeedsData = $validatedData['special_needs'] ?? [];

            $specialNeed = SpecialNeed::create($specialNeedsData);

            $learnerSeniorData = $validatedData['learner_senior'] ?? [];
            Log::info('Learner senior data extracted.', ['learnerSeniorData' => $learnerSeniorData]);

            $learnerSenior = LearnerSenior::create($learnerSeniorData);
            Log::info('Learner senior created.', ['learnerSenior' => $learnerSenior]);

            $returningLearnerData = $validatedData['returning_learner'] ?? [];
            Log::info('Returning learner data extracted.', ['returningLearnerData' => $returningLearnerData]);

            $returningLearner = ReturningLearner::create($returningLearnerData);
            Log::info('Returning learner created.', ['returningLearner' => $returningLearner]);

            // Handle file uploads
            $requirements = [];
            if ($request->hasFile('requirements.birth_certificate')) {
                $birthCertificatePath = $request->file('requirements.birth_certificate')->store('requirements', 'public');
                $requirements[] = [
                    'description' => 'Birth Certificate',
                    'path' => $birthCertificatePath,
                ];
            }
            if ($request->hasFile('requirements.grade_10_card')) {
                $grade10CardPath = $request->file('requirements.grade_10_card')->store('requirements', 'public');
                $requirements[] = [
                    'description' => 'Grade 10 Card',
                    'path' => $grade10CardPath,
                ];
            }

            $validatedData['home_address_id'] = $homeAddress->id;
            $validatedData['current_address_id'] = $currentAddress->id;
            $validatedData['personal_information_id'] = $personalInformation->id;
            $validatedData['parent_information_id'] = $parentInformation->id;
            $validatedData['special_need_id'] = $specialNeed->id;
            $validatedData['learner_senior_id'] = $learnerSenior->id;
            $validatedData['returning_learner_id'] = $returningLearner->id;

            $enrollment = Enrollment::create($validatedData);
            Log::info('Enrollment created successfully.', ['enrollment' => $enrollment]);

            // Save requirements
            foreach ($requirements as $requirementData) {
                $requirement = Requirement::create($requirementData);
                $enrollment->requirements()->attach($requirement->id);
            }

            return redirect()->route('form.thank-you')->with('success', 'Enrollment created successfully.');
        } catch (\Exception $e) {
            Log::error('An error occurred during form submission.', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return redirect()->back()->withInput()->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
}
