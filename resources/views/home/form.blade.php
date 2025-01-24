<x-layout>
    <div class="min-h-screen bg-gray-50 py-8">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Progress Bar -->
            <div class="mb-8">
                <div class="relative">
                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                        <div id="progress"
                            class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500 transition-all duration-500"
                            style="width: 0%">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Container -->
            <div class="bg-white shadow-lg rounded-lg p-6 md:p-8">
                @if (session('success'))
                    <div class="mb-4 text-green-500">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-4 text-red-500">
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="text-red-500">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form id="stepperForm" method="POST" action="{{ route('form.store') }}" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf

                    <!-- Step 1: Welcome -->
                    @include('home.partials.welcome')

                    <!-- Step 2: Requirements -->
                    @include('home.partials.requirements')

                    <!-- Step 3: School Information -->
                    @include('home.partials.school-information')

                    <!-- Step 4: Personal Information -->
                    @include('home.partials.personal-information')

                    <!-- Step 5: Address Information -->
                    @include('home.partials.address-information')

                    <!-- Step 6: Parent Information -->
                    @include('home.partials.parent-information')

                    <!-- Step 7: Special Needs -->
                    @include('home.partials.special-needs')

                    <!-- Step 8: Learning Preferences -->
                    @include('home.partials.learning-preferences')

                    <!-- Step 9: Returning Learner -->
                    @include('home.partials.returning-learner')

                    <!-- Step 10: Learner Senior Information -->
                    @include('home.partials.learner-senior-information')

                    <!-- Step 11: Upload Requirements -->
                    @include('home.partials.documents')

                    <div class="step hidden" id="step12">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Agreement</h2>

                        <div class="bg-gray-50 rounded-lg border border-gray-200 p-6 mb-8">
                            <div class="flex items-start space-x-3">
                                <input type="checkbox" id="agreementCheckbox"
                                    class="mt-1 h-5 w-5 rounded border-gray-300 text-blue-600 focus:ring-blue-500 cursor-pointer">
                                <label for="agreementCheckbox" class="text-gray-700 text-sm">
                                    I hereby declare that the information given is true and correct to the best of my
                                    knowledge and I
                                    will allow the Department of Education to use my child's details to create and/or
                                    update his/her
                                    learner profile in the Learner Information System (LIS). The information herein
                                    shall be treated
                                    as confidential in compliance with the Data Privacy Act of 2012.
                                </label>
                            </div>
                            <div id="checkboxError" class="hidden mt-2 text-sm text-red-600 ml-8">
                                Please agree to the terms before submitting the enrollment.
                            </div>
                        </div>

                        <div class="flex justify-between items-center">
                            <button type="button" onclick="prevStep(12)"
                                class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                                <span class="mr-2">←</span> Back
                            </button>
                            <button type="submit" id="submitButton" disabled
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200 disabled:opacity-50 disabled:cursor-not-allowed disabled:hover:bg-blue-600">
                                Submit Enrollment
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <x-footer />

    <script src="{{ asset('js/city.min.js') }}"></script>
    @include('home.partials.validation')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkbox = document.getElementById('agreementCheckbox');
            const submitButton = document.getElementById('submitButton');
            const errorMessage = document.getElementById('checkboxError');

            if (checkbox && submitButton) {
                // Enable/disable submit button based on checkbox state
                checkbox.addEventListener('change', function() {
                    submitButton.disabled = !this.checked;
                    if (errorMessage) {
                        errorMessage.classList.toggle('hidden', this.checked);
                    }
                });

                // Form submission handler
                submitButton.addEventListener('click', function(e) {
                    if (!checkbox.checked) {
                        e.preventDefault(); // Prevent submission if checkbox isn't checked
                        if (errorMessage) {
                            errorMessage.classList.remove('hidden');
                        }
                    }
                });
            } else {
                console.error('Checkbox or submit button not found!');
            }
        });
    </script>
    <script>
        // Constants
        const CONFIG = {
            totalSteps: 12,
        };

        // State management
        let currentStep = 1;

        // Progress bar functions
        function updateProgress() {
            const progress = ((currentStep - 1) / (CONFIG.totalSteps - 1)) * 100;
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

        // Navigation functions
        function nextStep(currentStepNumber) {
            if (validateStep(currentStepNumber)) {
                showStep(currentStepNumber + 1);
            }
        }

        function prevStep(currentStepNumber) {
            showStep(currentStepNumber - 1);
        }

        // Error handling functions
        function showError(element, message) {
            if (!element.parentElement) return;

            const existingError = element.parentElement.querySelector('.error-message');
            if (!existingError) {
                const div = document.createElement('div');
                div.className = 'error-message text-red-500 text-sm mt-1';
                div.textContent = message;
                element.parentElement.appendChild(div);
            }
        }

        function removeError(element) {
            const errorDiv = element.parentElement?.querySelector('.error-message');
            errorDiv?.remove();
        }

        function showStepError(stepElement, message) {
            const errorClass = 'step-error';
            const existingAlert = stepElement.querySelector(`.${errorClass}`);

            if (!existingAlert) {
                const alertDiv = document.createElement('div');
                alertDiv.className = `${errorClass} bg-red-50 border-l-4 border-red-400 p-4 my-4`;
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

        // Form event handlers
        function initializeFormHandlers() {
            // Form submission
            const form = document.getElementById('stepperForm');
            form?.addEventListener('submit', handleFormSubmit);

            // Special needs toggle
            document.querySelectorAll('input[name="has_special_needs"]').forEach(radio => {
                radio.addEventListener('change', handleSpecialNeedsChange);
            });

            // Returning learner toggle
            const returningLearnerSelect = document.getElementById('is_returning');
            returningLearnerSelect?.addEventListener('change', handleReturningLearnerChange);

            // Same as home address toggle
            const sameAsHomeCheckbox = document.getElementById('same_as_home');
            sameAsHomeCheckbox?.addEventListener('change', handleSameAddressChange);
        }

        // Event handler implementations
        function handleFormSubmit(e) {
            e.preventDefault();
            if (validateStep(currentStep)) {
                const submitButton = this.querySelector('button[type="submit"]');
                if (submitButton) {
                    submitButton.disabled = true;
                    submitButton.innerHTML = '<span class="spinner"></span> Submitting...';
                    this.submit();
                }
            }
        }

        function handleSpecialNeedsChange() {
            const detailsDiv = document.getElementById('special_needs_details');
            if (detailsDiv) {
                detailsDiv.classList.toggle('hidden', this.value !== '1');
            }
        }

        function handleReturningLearnerChange() {
            const detailsDiv = document.getElementById('returning_learner_details');
            if (detailsDiv) {
                detailsDiv.classList.toggle('hidden', this.value !== 'yes');
            }
        }

        function handleSameAddressChange() {
            const currentAddressSection = document.getElementById('current_address_section');
            if (!currentAddressSection) return;

            const currentAddressInputs = currentAddressSection.querySelectorAll('input, select');

            if (this.checked) {
                currentAddressSection.style.display = 'none';
                copyHomeAddress();
                setCurrentAddressRequired(false, currentAddressInputs);
            } else {
                currentAddressSection.style.display = 'block';
                setCurrentAddressRequired(true, currentAddressInputs);
            }
        }

        function setCurrentAddressRequired(required, inputs) {
            inputs.forEach(input => {
                if (input.hasAttribute('required-if-shown')) {
                    input.required = required;
                }
            });
        }

        // Initialize everything when the page loads
        window.addEventListener('load', () => {
            updateProgress();
            initializeFormHandlers();
            initializeCitySelection();
        });
    </script>
</x-layout>
