<x-layout>
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Progress Bar -->
            <div class="mb-8">
                <div class="relative">
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                        <div id="progress"
                            class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500 transition-all duration-500"
                            style="width: 0%">
                        </div>
                    </div>
                    <div class="flex justify-between text-xs text-gray-600">
                        <div>Welcome</div>
                        <div>Requirements</div>
                        <div>School Info</div>
                        <div>Personal Info</div>
                        <div>Address</div>
                        <div>Parent Info</div>
                        <div>Special Needs</div>
                        <div>Learning Pref</div>
                    </div>
                </div>
            </div>

            <!-- Form Container -->
            <div class="bg-white shadow-lg rounded-lg p-6 md:p-8">
                <form id="stepperForm" method="POST" action="{{ route('enrollment.store') }}" class="space-y-6">
                    @csrf

                    <!-- Step 1: Welcome -->
                    <div class="step active" id="step1">
                        <div class="text-center space-y-4">
                            <h2 class="text-3xl font-bold text-gray-900">Welcome to Enrollment</h2>
                            <p class="text-lg text-gray-600">Please complete all the required information for student
                                enrollment. Make sure to prepare all necessary documents.</p>
                            <div class="mt-8">
                                <img src="/api/placeholder/400/200" alt="Welcome illustration" class="mx-auto">
                            </div>
                        </div>
                        <div class="mt-8 flex justify-end">
                            <button type="button" onclick="nextStep(1)"
                                class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Get Started →
                            </button>
                        </div>
                    </div>

                    <!-- Step 2: Requirements -->
                    <div class="step hidden" id="step2">
                        <div class="space-y-4">
                            <h2 class="text-2xl font-bold text-gray-900">Required Documents</h2>
                            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
                                <div class="flex">
                                    <div class="ml-3">
                                        <p class="text-sm text-yellow-700">
                                            Please ensure you have the following documents ready:
                                        </p>
                                        <ul class="mt-2 ml-4 list-disc text-sm text-yellow-700">
                                            <li>Birth Certificate</li>
                                            <li>Valid ID</li>
                                            <li>Recent Photo</li>
                                            <li>4Ps Number (if applicable)</li>
                                            <li>Report Card/Form 137</li>
                                            <li>Good Moral Certificate</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8 flex justify-between">
                            <button type="button" onclick="prevStep(2)"
                                class="inline-flex items-center px-4 py-2 border border-gray-300 text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                ← Back
                            </button>
                            <button type="button" onclick="nextStep(2)"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">
                                Continue →
                            </button>
                        </div>
                    </div>

                    <!-- Step 3: School Information -->
                    <div class="step hidden" id="step3">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">School Information</h2>
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label for="school_year" class="block text-sm font-medium text-gray-700">School
                                    Year</label>
                                <input type="text" id="school_year" name="school_year" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            <div>
                                <label for="learners_reference_no" class="block text-sm font-medium text-gray-700">LRN
                                    (Learner's Reference Number)</label>
                                <input type="text" id="learners_reference_no" name="learners_reference_no" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            <div>
                                <label for="grade_to_enroll" class="block text-sm font-medium text-gray-700">Grade Level
                                    to Enroll</label>
                                <select id="grade_to_enroll" name="grade_to_enroll" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="">Select Grade Level</option>
                                    @foreach (range(7, 12) as $grade)
                                        <option value="{{ $grade }}">Grade {{ $grade }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mt-8 flex justify-between">
                            <button type="button" onclick="prevStep(3)"
                                class="inline-flex items-center px-4 py-2 border border-gray-300 text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                ← Back
                            </button>
                            <button type="button" onclick="nextStep(3)"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">
                                Continue →
                            </button>
                        </div>
                    </div>

                    <!-- Step 4: Personal Information -->
                    @include('enrollment.partials.personal-information')

                    <!-- Step 5: Address Information -->
                    <div class="step hidden" id="step5">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Address Information</h2>
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div>
                                <label for="house_no" class="block text-sm font-medium text-gray-700">House
                                    Number</label>
                                <input type="text" id="house_no" name="address[house_no]" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            <div>
                                <label for="street_name" class="block text-sm font-medium text-gray-700">Street
                                    Name</label>
                                <input type="text" id="street_name" name="address[street_name]" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            <div>
                                <label for="province" class="block text-sm font-medium text-gray-700">Province</label>
                                <select id="province" name="address[province]" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </select>
                            </div>
                            <div>
                                <label for="city"
                                    class="block text-sm font-medium text-gray-700">City/Municipality</label>
                                <select id="city" name="address[city]" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                </select>
                            </div>
                            <div>
                                <label for="barangay" class="block text-sm font-medium text-gray-700">Barangay</label>
                                <input type="text" id="barangay" name="address[barangay]" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            <div>
                                <label for="zip_code" class="block text-sm font-medium text-gray-700">Zip Code</label>
                                <input type="text" id="zip_code" name="address[zip_code]" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                        </div>
                        <div class="mt-8 flex justify-between">
                            <button type="button" onclick="prevStep(5)"
                                class="inline-flex items-center px-4 py-2 border border-gray-300 text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                ← Back
                            </button>
                            <button type="button" onclick="nextStep(5)"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">
                                Continue →
                            </button>
                        </div>
                    </div>

                    <!-- Step 6: Parent Information -->
                    @include('enrollment.partials.parent-information')

                    <!-- Step 7: Special Needs -->
                    <div class="step hidden" id="step7">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Special Needs Information</h2>
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Do you have any special needs or
                                    conditions?</label>
                                <div class="mt-2">
                                    <label class="inline-flex items-center">
                                        <input type="radio" name="has_special_needs" value="1"
                                            class="form-radio">
                                        <span class="ml-2">Yes</span>
                                    </label>
                                    <label class="inline-flex items-center ml-6">
                                        <input type="radio" name="has_special_needs" value="0"
                                            class="form-radio">
                                        <span class="ml-2">No</span>
                                    </label>
                                </div>
                            </div>
                            <div id="special_needs_details" class="hidden">
                                <div>
                                    <label for="special_needs_description"
                                        class="block text-sm font-medium text-gray-700">Please describe your special
                                        needs</label>
                                    <textarea id="special_needs_description" name="special_needs[description]" rows="3"
                                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8 flex justify-between">
                            <button type="button" onclick="prevStep(7)"
                                class="inline-flex items-center px-4 py-2 border border-gray-300 text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                ← Back
                            </button>
                            <button type="button" onclick="nextStep(7)"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">
                                Continue →
                            </button>
                        </div>
                    </div>

                    <!-- Step 8: Learning Preferences -->
                    <div class="step hidden" id="step8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Learning Preferences</h2>
                        <div class="space-y-6">
                            <div>
                                <label for="distance_learning_preference"
                                    class="block text-sm font-medium text-gray-700">Preferred Learning Modality</label>
                                <select id="distance_learning_preference" name="distance_learning_preference" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    <option value="">Select Learning Modality</option>
                                    <option value="modular">Modular (Print)</option>
                                    <option value="online">Online</option>
                                    <option value="blended">Blended</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-8 flex justify-between">
                            <button type="button" onclick="prevStep(8)"
                                class="inline-flex items-center px-4 py-2 border border-gray-300 text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                ← Back
                            </button>
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">
                                Submit Enrollment
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/city.min.js') }}"></script>
    <script>
        const totalSteps = 8;
        let currentStep = 1;

        function updateProgress() {
            const progress = ((currentStep - 1) / (totalSteps - 1)) * 100;
            document.getElementById('progress').style.width = `${progress}%`;
        }

        function showStep(stepNumber) {
            document.querySelectorAll('.step').forEach(step => {
                step.classList.add('hidden');
                step.classList.remove('active');
            });
            const currentStepElement = document.getElementById(`step${stepNumber}`);
            if (currentStepElement) {
                currentStepElement.classList.remove('hidden');
                currentStepElement.classList.add('active');
                currentStep = stepNumber;
                updateProgress();
            }
        }

        function validateStep(stepNumber) {
            const currentStepElement = document.getElementById(`step${stepNumber}`);
            if (!currentStepElement) return true;

            // Skip validation for welcome and requirements steps
            if (stepNumber <= 2) return true;

            const requiredInputs = currentStepElement.querySelectorAll(
                'input[required], select[required], textarea[required]');
            let isValid = true;

            requiredInputs.forEach(input => {
                if (!input.value.trim()) {
                    isValid = false;
                    input.classList.add('border-red-500');
                    showError(input, 'This field is required');
                } else {
                    input.classList.remove('border-red-500');
                    removeError(input);
                }
            });

            // Special validation for specific steps
            switch (stepNumber) {
                case 3: // School Information
                    isValid = validateSchoolInfo() && isValid;
                    break;
                case 4: // Personal Information
                    isValid = validatePersonalInfo() && isValid;
                    break;
                case 5: // Address
                    isValid = validateAddress() && isValid;
                    break;
                case 6: // Parent Information
                    isValid = validateParentInfo() && isValid;
                    break;
                case 7: // Special Needs
                    isValid = validateSpecialNeeds() && isValid;
                    break;
                case 8: // Learning Preferences
                    isValid = validateLearningPreferences() && isValid;
                    break;
            }

            if (!isValid) {
                showStepError(currentStepElement, 'Please fill in all required fields correctly');
            }

            return isValid;
        }

        // Validation functions for each step
        function validateSchoolInfo() {
            const lrnInput = document.getElementById('learners_reference_no');
            if (lrnInput && !/^\d{12}$/.test(lrnInput.value)) {
                showError(lrnInput, 'LRN must be 12 digits');
                return false;
            }
            return true;
        }

        function validatePersonalInfo() {
            // Add specific validations for personal information
            return true;
        }

        function validateAddress() {
            // Add specific validations for address
            return true;
        }

        function validateParentInfo() {
            // Add specific validations for parent information
            return true;
        }

        function validateSpecialNeeds() {
            const hasSpecialNeeds = document.querySelector('input[name="has_special_needs"]:checked');
            if (!hasSpecialNeeds) {
                showStepError(document.getElementById('step7'), 'Please indicate if you have special needs');
                return false;
            }
            return true;
        }

        function validateLearningPreferences() {
            // Add specific validations for learning preferences
            return true;
        }

        // Error handling functions
        function showError(element, message) {
            const errorDiv = element.parentElement.querySelector('.error-message');
            if (!errorDiv) {
                const div = document.createElement('div');
                div.className = 'error-message text-red-500 text-sm mt-1';
                div.textContent = message;
                element.parentElement.appendChild(div);
            }
        }

        function removeError(element) {
            const errorDiv = element.parentElement.querySelector('.error-message');
            if (errorDiv) {
                errorDiv.remove();
            }
        }

        function showStepError(stepElement, message) {
            const existingAlert = stepElement.querySelector('.step-error');
            if (!existingAlert) {
                const alertDiv = document.createElement('div');
                alertDiv.className = 'step-error bg-red-50 border-l-4 border-red-400 p-4 my-4';
                alertDiv.innerHTML = `
                    <div class="flex">
                        <div class="ml-3">
                            <p class="text-sm text-red-700">${message}</p>
                        </div>
                    </div>
                `;
                stepElement.insertBefore(alertDiv, stepElement.firstChild);
            }
        }

        function nextStep(currentStepNumber) {
            if (validateStep(currentStepNumber)) {
                showStep(currentStepNumber + 1);
            }
        }

        function prevStep(currentStepNumber) {
            showStep(currentStepNumber - 1);
        }

        // Form submission handler
        document.getElementById('stepperForm').addEventListener('submit', function(e) {
            e.preventDefault();
            if (validateStep(currentStep)) {
                // Show loading state
                const submitButton = this.querySelector('button[type="submit"]');
                submitButton.disabled = true;
                submitButton.innerHTML = '<span class="spinner"></span> Submitting...';

                // Submit the form
                this.submit();
            }
        });

        // Special needs toggle
        document.querySelectorAll('input[name="has_special_needs"]').forEach(radio => {
            radio.addEventListener('change', function() {
                const detailsDiv = document.getElementById('special_needs_details');
                if (this.value === '1') {
                    detailsDiv.classList.remove('hidden');
                } else {
                    detailsDiv.classList.add('hidden');
                }
            });
        });

        // Initialize city selection
        window.onload = function() {
            // Initialize progress bar
            updateProgress();

            // Initialize city selection
            if (typeof City !== 'undefined') {
                var $ = new City();
                $.showProvinces("#province");
                $.showCities("#city");

                // Handle province change
                document.getElementById('province').addEventListener('change', function() {
                    $.showCities("#city");
                });
            }
        };
    </script>
</x-layout>
