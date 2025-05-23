<div class="step hidden" id="step8">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Learning Preferences</h2>
    <div class="space-y-6">
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Learning Modalities</label>
            <div class="space-y-2">
                <div class="flex items-center">
                    <input type="checkbox" id="modular" name="distance_learning_preference[]" value="modular"
                        class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                        {{ in_array('modular', old('distance_learning_preference', [])) ? 'checked' : '' }}>
                    <label for="modular" class="ml-2 text-sm text-gray-700">Modular (Print)</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="modular_digital" name="distance_learning_preference[]"
                        value="modular_digital"
                        class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                        {{ in_array('modular_digital', old('distance_learning_preference', [])) ? 'checked' : '' }}>
                    <label for="modular_digital" class="ml-2 text-sm text-gray-700">Modular (Digital)</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="online" name="distance_learning_preference[]" value="online"
                        class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                        {{ in_array('online', old('distance_learning_preference', [])) ? 'checked' : '' }}>
                    <label for="online" class="ml-2 text-sm text-gray-700">Online</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="blended" name="distance_learning_preference[]" value="blended"
                        class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                        {{ in_array('blended', old('distance_learning_preference', [])) ? 'checked' : '' }}>
                    <label for="blended" class="ml-2 text-sm text-gray-700">Blended</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="educational_television" name="distance_learning_preference[]"
                        value="educational_television"
                        class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                        {{ in_array('educational_television', old('distance_learning_preference', [])) ? 'checked' : '' }}>
                    <label for="educational_television" class="ml-2 text-sm text-gray-700">Educational
                        Television</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="radio_based_instruction" name="distance_learning_preference[]"
                        value="radio_based_instruction"
                        class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                        {{ in_array('radio_based_instruction', old('distance_learning_preference', [])) ? 'checked' : '' }}>
                    <label for="radio_based_instruction" class="ml-2 text-sm text-gray-700">Radio-Based
                        Instruction</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="homeschooling" name="distance_learning_preference[]"
                        value="homeschooling" class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                        {{ in_array('homeschooling', old('distance_learning_preference', [])) ? 'checked' : '' }}>
                    <label for="homeschooling" class="ml-2 text-sm text-gray-700">Homeschooling</label>
                </div>
            </div>
            @error('distance_learning_preference')
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
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
