<div class="step hidden" id="step7">
    <div class="max-w-3xl mx-auto">
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Special Needs Information</h2>
        <p class="text-gray-600 mb-6">This information helps us provide better support for your educational journey.</p>

        <div class="space-y-8">
            {{-- Initial Question --}}
            <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                <label class="text-base font-medium text-gray-900">Do you have any special needs or conditions?</label>
                <p class="text-sm text-gray-500 mt-1">This information will be kept confidential and used only to provide
                    appropriate support.</p>
                <div class="mt-4 space-x-6">
                    <label class="inline-flex items-center">
                        <input type="radio" name="has_special_needs" value="1"
                            class="w-4 h-4 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-gray-700">Yes</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="has_special_needs" value="0"
                            class="w-4 h-4 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-gray-700">No</span>
                    </label>
                </div>
            </div>

            {{-- Special Needs Details Section --}}
            <div id="special_needs_details" class="hidden space-y-8">
                {{-- Special Needs Type --}}
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <label class="block text-base font-medium text-gray-900 mb-3">Type of Special Need</label>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                        @foreach ([
        'adhd' => 'Attention Deficit Hyperactivity Disorder (ADHD)',
        'asd' => 'Autism Spectrum Disorder (ASD)',
        'cp' => 'Cerebral Palsy',
        'ebd' => 'Emotional-Behavior Disorder',
        'hi' => 'Hearing Impairment',
        'id' => 'Intellectual Disability',
        'ld' => 'Learning Disability',
        'md' => 'Multiple Disabilities',
        'oph' => 'Orthopedic/Physical Handicap',
        'sld' => 'Speech/Language Disorder',
        'shp_cancer' => 'Special Health Problems (Cancer)',
        'shp_non_cancer' => 'Special Health Problems (Non-Cancer)',
        'vi_blind' => 'Visual Impairment (Blind)',
        'vi_low_vision' => 'Visual Impairment (Low Vision)',
    ] as $value => $label)
                            <label class="relative flex items-start py-2">
                                <div class="flex items-center h-5">
                                    <input type="checkbox" name="special_needs[type][]" value="{{ $value }}"
                                        class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                </div>
                                <div class="ml-3 text-sm">
                                    <span class="text-gray-700">{{ $label }}</span>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                {{-- Manifestations --}}
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <label class="block text-base font-medium text-gray-900 mb-3">Areas Requiring Support</label>
                    <p class="text-sm text-gray-500 mb-4">Select all areas where you may need assistance:</p>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                        @foreach ([
        'applying_knowledge' => 'Difficulty in Applying Knowledge',
        'communicating' => 'Difficulty in Communication',
        'interpersonal_behavior' => 'Difficulty with Social Interaction',
        'hearing' => 'Difficulty in Hearing',
        'mobility' => 'Difficulty with Mobility',
        'adaptive_skill' => 'Difficulty with Self-Care',
        'remembering_concentrating' => 'Difficulty with Focus and Memory',
        'seeing' => 'Difficulty in Seeing',
    ] as $value => $label)
                            <label class="relative flex items-start py-2">
                                <div class="flex items-center h-5">
                                    <input type="checkbox" name="special_needs[with_manifestations][]"
                                        value="{{ $value }}"
                                        class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                                </div>
                                <div class="ml-3 text-sm">
                                    <span class="text-gray-700">{{ $label }}</span>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                {{-- PWD ID Section --}}
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
                    <label for="is_have_pwd_id" class="block text-base font-medium text-gray-900 mb-2">
                        Do you have a PWD ID?
                    </label>
                    <select id="is_have_pwd_id" name="special_needs[is_have_pwd_id]"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-gray-700">
                        <option value="">Please select...</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>
        </div>

        {{-- Navigation Buttons --}}
        <div class="mt-8 flex justify-between">
            <button type="button" onclick="prevStep(7)"
                class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                ← Previous
            </button>
            <button type="button" onclick="nextStep(7)"
                class="inline-flex items-center px-6 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                Continue →
            </button>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        // Function to handle special needs selection
        function handleSpecialNeedsSelection(value) {
            const detailsSection = document.getElementById('special_needs_details');
            if (value === '1') {
                detailsSection.classList.remove('hidden');
            } else {
                detailsSection.classList.add('hidden');
            }
            localStorage.setItem('has_special_needs', value);
        }

        // Add event listeners to radio buttons
        document.querySelectorAll('input[name="has_special_needs"]').forEach(radio => {
            radio.addEventListener('change', function() {
                handleSpecialNeedsSelection(this.value);
            });
        });

        // Check localStorage and set initial state on page load
        window.addEventListener('DOMContentLoaded', function() {
            const savedValue = localStorage.getItem('has_special_needs');
            if (savedValue) {
                // Set the radio button
                const radio = document.querySelector(`input[name="has_special_needs"][value="${savedValue}"]`);
                if (radio) {
                    radio.checked = true;
                    // Show/hide details section immediately
                    handleSpecialNeedsSelection(savedValue);
                }
            } else {
                // If no saved value, default to showing the initial question
                document.querySelector('input[name="has_special_needs"][value="0"]').checked = true;
                handleSpecialNeedsSelection('0');
            }
        });
    </script>
@endpush
