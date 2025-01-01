<div class="step hidden" id="step9">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Returning Learner</h2>
    <div class="space-y-6">
        <div>
            <label for="is_returning" class="block text-sm font-medium text-gray-700">Are you a
                returning learner?</label>
            <select id="is_returning" name="is_returning" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <option value="">Select an option</option>
                <option value="yes">Yes</option>
                <option value="no">No</option>
            </select>
        </div>
        <div id="returning_learner_details" class="hidden space-y-6">
            <div>
                <label for="grade_level" class="block text-sm font-medium text-gray-700">Grade
                    Level</label>
                <input type="text" id="grade_level" name="returning_learner[grade_level]"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label for="school_year" class="block text-sm font-medium text-gray-700">School
                    Year</label>
                <input type="text" id="school_year" name="returning_learner[school_year]"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label for="school" class="block text-sm font-medium text-gray-700">School</label>
                <input type="text" id="school" name="returning_learner[school]"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
            <div>
                <label for="school_id" class="block text-sm font-medium text-gray-700">School
                    ID</label>
                <input type="text" id="school_id" name="returning_learner[school_id]"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            </div>
        </div>
    </div>
    <div class="mt-8 flex justify-between">
        <button type="button" onclick="prevStep(9)"
            class="inline-flex items-center px-4 py-2 border border-gray-300 text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
            ← Back
        </button>
        <button type="button" onclick="nextStep(9)"
            class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">
            Continue →
        </button>
    </div>
</div>
