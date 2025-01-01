<div class="step hidden" id="step7">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Special Needs Information</h2>
    <div class="space-y-6">
        <div>
            <label class="block text-sm font-medium text-gray-700">Do you have any special needs or
                conditions?</label>
            <div class="mt-2">
                <label class="inline-flex items-center">
                    <input type="radio" name="has_special_needs" value="1" class="form-radio">
                    <span class="ml-2">Yes</span>
                </label>
                <label class="inline-flex items-center ml-6">
                    <input type="radio" name="has_special_needs" value="0" class="form-radio">
                    <span class="ml-2">No</span>
                </label>
            </div>
        </div>
        <div id="special_needs_details" class="hidden">
            <div>
                <label for="special_needs_description" class="block text-sm font-medium text-gray-700">Please describe
                    your special
                    needs</label>
                <textarea id="special_needs_description" name="special_needs[description]" rows="3"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
            </div>
            <div>
                <label for="with_diagnosis" class="block text-sm font-medium text-gray-700">With
                    Diagnosis</label>
                <textarea id="with_diagnosis" name="special_needs[with_diagnosis]" rows="3"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
            </div>
            <div>
                <label for="with_manifestations" class="block text-sm font-medium text-gray-700">With
                    Manifestations</label>
                <textarea id="with_manifestations" name="special_needs[with_manifestations]" rows="3"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"></textarea>
            </div>
            <div>
                <label for="is_have_pwd_id" class="block text-sm font-medium text-gray-700">Do you
                    have a PWD ID?</label>
                <select id="is_have_pwd_id" name="special_needs[is_have_pwd_id]" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
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
