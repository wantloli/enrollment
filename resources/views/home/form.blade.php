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
                    <div class="flex justify-between text-xs text-gray-600">
                        <div>Welcome</div>
                        <div>Requirements</div>
                        <div>School Info</div>
                        <div>Personal Info</div>
                        <div>Returning Learner</div>
                        <div>Address</div>
                        <div>Parent Info</div>
                        <div>Special Needs</div>
                        <div>Learning Pref</div>
                        <div>Documents</div>
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
                    <div class="step hidden" id="step5">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Address Information</h2>
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                            <div>
                                <label for="house_no" class="block text-sm font-medium text-gray-700">House
                                    Number</label>
                                <input type="text" id="house_no" name="address[house_no]" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2"
                                    oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div>
                                <label for="street_name" class="block text-sm font-medium text-gray-700">Street
                                    Name</label>
                                <input type="text" id="street_name" name="address[street_name]" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2"
                                    oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div>
                                <label for="province" class="block text-sm font-medium text-gray-700">Province</label>
                                <select id="province" name="address[province]" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2">
                                    <option selected disabled>Select Province</option>
                                </select>
                            </div>
                            <div>
                                <label for="municipality"
                                    class="block text-sm font-medium text-gray-700">City/Municipality</label>
                                <select id="municipality" name="address[municipality]" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2">
                                    <option selected disabled>Select City / Municipality</option>
                                </select>
                            </div>
                            <div>
                                <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                                <select id="country" name="address[country]" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2">
                                    <option value="Philippines" selected>Philippines</option>
                                    @foreach ($countries as $country)
                                        @if ($country != 'Philippines')
                                            <option value="{{ $country }}">{{ $country }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="barangay" class="block text-sm font-medium text-gray-700">Barangay</label>
                                <input type="text" id="barangay" name="address[barangay]" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2"
                                    oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div>
                                <label for="zip_code" class="block text-sm font-medium text-gray-700">Zip Code</label>
                                <input type="text" id="zip_code" name="address[zip_code]" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2"
                                    oninput="this.value = this.value.toUpperCase()">
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
                    @include('home.partials.parent-information')

                    <!-- Step 7: Special Needs -->
                    @include('home.partials.special-needs')

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
                            <button type="button" onclick="nextStep(8)"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">
                                Continue →
                            </button>
                        </div>
                    </div>

                    <!-- Step 9: Returning Learner -->
                    @include('home.partials.returning-learner')

                    <!-- Step 10: Learner Senior Information -->
                    <div class="step hidden" id="step10">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Learner Senior Information</h2>
                        <div class="space-y-6">
                            <div>
                                <label for="semester" class="block text-sm font-medium text-gray-700">Semester</label>
                                <input type="text" id="semester" name="learner_senior[semester]" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div>
                                <label for="track" class="block text-sm font-medium text-gray-700">Track</label>
                                <input type="text" id="track" name="learner_senior[track]" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    oninput="this.value = this.value.toUpperCase()">
                            </div>
                            <div>
                                <label for="strand" class="block text-sm font-medium text-gray-700">Strand</label>
                                <input type="text" id="strand" name="learner_senior[strand]" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                    oninput="this.value = this.value.toUpperCase()">
                            </div>
                        </div>
                        <div class="mt-8 flex justify-between">
                            <button type="button" onclick="prevStep(10)"
                                class="inline-flex items-center px-4 py-2 border border-gray-300 text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                ← Back
                            </button>
                            <button type="button" onclick="nextStep(10)"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">
                                Continue →
                            </button>
                        </div>
                    </div>

                    <!-- Step 11: Upload Requirements -->
                    <div class="step hidden" id="step11">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Upload Requirements</h2>
                        <div class="space-y-6">
                            <div>
                                <label for="birth_certificate" class="block text-sm font-medium text-gray-700">Birth
                                    Certificate</label>
                                <input type="file" id="birth_certificate" name="requirements[birth_certificate]"
                                    required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                            <div>
                                <label for="grade_10_card" class="block text-sm font-medium text-gray-700">Grade 10
                                    Card</label>
                                <input type="file" id="grade_10_card" name="requirements[grade_10_card]" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>
                        </div>
                        <div class="mt-8 flex justify-between">
                            <button type="button" onclick="prevStep(11)"
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

    <x-footer />

    <script src="{{ asset('js/city.min.js') }}"></script>
    @include('home.partials.validation')
    <script>
        const totalSteps = 11;
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

        // Show/hide returning learner details
        document.getElementById('is_returning').addEventListener('change', function() {
            const detailsDiv = document.getElementById('returning_learner_details');
            if (this.value === 'yes') {
                detailsDiv.classList.remove('hidden');
            } else {
                detailsDiv.classList.add('hidden');
            }
        });

        // Initialize city selection
        window.onload = function() {
            // Initialize progress bar
            updateProgress();

            // Initialize city selection
            if (typeof City !== 'undefined') {
                var city = new City();
                city.showProvinces("#province");

                // Handle province change
                document.getElementById('province').addEventListener('change', function() {
                    var selectedProvince = this.value;
                    city.showCities(selectedProvince, "#municipality");
                });
            }
        };
    </script>
</x-layout>
