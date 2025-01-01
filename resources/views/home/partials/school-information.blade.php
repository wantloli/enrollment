<div class="step hidden" id="step3">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">School Information</h2>
    <div class="grid grid-cols-1 gap-6">
        <div>
            <label for="school_year" class="block text-sm font-medium text-gray-700">School
                Year</label>
            <select id="school_year" name="school_year" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2">
                <option value="">Select School Year</option>
                @foreach (range(date('Y') - 5, date('Y') + 5) as $year)
                    <option value="{{ $year }}-{{ $year + 1 }}">
                        {{ $year }}-{{ $year + 1 }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for="learners_reference_no" class="block text-sm font-medium text-gray-700">LRN
                (Learner's Reference Number)</label>
            <input type="text" id="learners_reference_no" name="learners_reference_no" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2">
        </div>
        <div>
            <label for="grade_to_enroll" class="block text-sm font-medium text-gray-700">Grade Level
                to Enroll</label>
            <select id="grade_to_enroll" name="grade_to_enroll" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2">
                <option value="">Select Grade Level</option>
                @foreach (range(11, 12) as $grade)
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
