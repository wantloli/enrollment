<div class="step hidden" id="step11">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Upload Requirements</h2>
    <div class="space-y-6">
        <div>
            <label for="birth_certificate" class="block text-sm font-medium text-gray-700">Birth
                Certificate</label>
            <input type="file" id="birth_certificate" name="requirements[birth_certificate]" required
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
        <button type="button" onclick="nextStep(11)"
            class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">
            Continue →
        </button>
    </div>
</div>
