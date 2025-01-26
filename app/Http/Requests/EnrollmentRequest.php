<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnrollmentRequest extends FormRequest
{
    private const NAME_REGEX = '/^[a-zA-Z\s\-]+$/';

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Modify based on your authorization requirements
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            // Basic enrollment info
            'school_year' => 'required|string|max:255',
            'learners_reference_no' => 'required|string|max:255',
            'grade_to_enroll' => 'required|string|max:255',
            'distance_learning_preference' => 'required|array|min:1',
            'distance_learning_preference.*' => 'required|string|in:modular,modular_digital,online,blended,educational_television,radio_based_instruction,homeschooling',

            // Personal info
            'last_name' => ['required', 'string', 'max:255', 'regex:' . self::NAME_REGEX],
            'middle_name' => ['required', 'string', 'max:255', 'regex:' . self::NAME_REGEX],
            'first_name' => ['required', 'string', 'max:255', 'regex:' . self::NAME_REGEX],
            'birth_certificate_no' => 'nullable|string|max:255',
            'age' => 'required|integer|min:1',
            'sex' => 'required|string|max:255',
            'birth_place' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'religion' => 'required|string|max:255',
            'mother_tongue' => 'required|string|max:255',
            'four_ps_household_number' => 'nullable|string|max:255',

            // Home address validation
            'home_address.house_no' => 'required|string|max:255',
            'home_address.street_name' => 'required|string|max:255',
            'home_address.province' => 'required|string|max:255',
            'home_address.municipality' => 'required|string|max:255',
            'home_address.barangay' => 'required|string|max:255',
            'home_address.country' => 'required|string|max:255',
            'home_address.zip_code' => 'required|string|max:255',

            // Current address validation
            'current_address.house_no' => 'nullable|required_unless:same_as_home,true|string|max:255',
            'current_address.street_name' => 'nullable|required_unless:same_as_home,true|string|max:255',
            'current_address.province' => 'nullable|required_unless:same_as_home,true|string|max:255',
            'current_address.municipality' => 'nullable|required_unless:same_as_home,true|string|max:255',
            'current_address.barangay' => 'nullable|required_unless:same_as_home,true|string|max:255',
            'current_address.country' => 'nullable|required_unless:same_as_home,true|string|max:255',
            'current_address.zip_code' => 'nullable|required_unless:same_as_home,true|string|max:255',


            'same_as_home' => 'boolean',

            // Requirements
            'requirements.birth_certificate' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'requirements.grade_10_card' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

            // Parent Information
            'father_last_name' => 'nullable|string|max:255',
            'father_first_name' => 'nullable|string|max:255',
            'father_middle_name' => 'nullable|string|max:255',
            'father_contact_number' => 'nullable|string|max:255',
            'mother_last_name' => 'nullable|string|max:255',
            'mother_first_name' => 'nullable|string|max:255',
            'mother_middle_name' => 'nullable|string|max:255',
            'mother_contact_number' => 'nullable|string|max:255',
            'legal_last_name' => 'nullable|string|max:255',
            'legal_first_name' => 'nullable|string|max:255',
            'legal_middle_name' => 'nullable|string|max:255',
            'legal_contact_number' => 'nullable|string|max:255',

            // Special Needs
            'has_special_needs' => 'nullable|boolean',
            'special_needs.type' => 'nullable|array',
            'special_needs.type.*' => 'string|in:adhd,asd,cp,ebd,hi,id,ld,md,oph,sld,shp_cancer,shp_non_cancer,vi_blind,vi_low_vision',
            'special_needs.with_manifestations' => 'nullable|array',
            'special_needs.with_manifestations.*' => 'string|in:applying_knowledge,communicating,interpersonal_behavior,hearing,mobility,adaptive_skill,remembering_concentrating,seeing',
            'special_needs.is_have_pwd_id' => 'nullable|boolean',

            // Learner Senior
            'learner_senior.semester' => 'required|string|max:255',
            'learner_senior.track' => 'required|string|max:255',
            'learner_senior.strand' => 'required|string|max:255',

            // Returning Learner
            'returning_learner.grade_level' => 'nullable|string|max:255',
            'returning_learner.school_year' => 'nullable|string|max:255',
            'returning_learner.school' => 'nullable|string|max:255',
            'returning_learner.school_id' => 'nullable|string|max:255',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'distance_learning_preference.required' => 'Please select at least one learning preference.',
            'distance_learning_preference.*.in' => 'Invalid learning preference selected.',
            'last_name.regex' => 'The last name may only contain letters, spaces, and hyphens.',
            'middle_name.regex' => 'The middle name may only contain letters, spaces, and hyphens.',
            'first_name.regex' => 'The first name may only contain letters, spaces, and hyphens.',
            'requirements.birth_certificate.required' => 'Birth certificate is required.',
            'requirements.grade_10_card.required' => 'Grade 10 card is required.',
            'special_needs.type.required_if' => 'Please specify the type of special needs.',
            'special_needs.with_manifestations.required_if' => 'Please specify the manifestations of special needs.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'same_as_home' => $this->boolean('same_as_home'),
        ]);
    }
}
