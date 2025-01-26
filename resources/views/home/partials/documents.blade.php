<div class="step hidden" id="step11">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Upload Requirements</h2>
    <div class="space-y-6">
        <div>
            <label for="birth_certificate" class="block text-sm font-medium text-gray-700">Birth Certificate</label>
            <input type="file" id="birth_certificate" name="requirements[birth_certificate]" accept="image/*" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                onchange="previewImage(this, 'birth_certificate_preview')">
            <img id="birth_certificate_preview" class="mt-2 h-40 w-full object-cover rounded-md" style="display:none;">
        </div>
        <div>
            <label for="grade_10_card" class="block text-sm font-medium text-gray-700">Grade 10 Card</label>
            <input type="file" id="grade_10_card" name="requirements[grade_10_card]" accept="image/*" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                onchange="previewImage(this, 'grade_10_card_preview')">
            <img id="grade_10_card_preview" class="mt-2 h-40 w-full object-cover rounded-md" style="display:none;">
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

<script>
    function previewImage(input, previewId) {
        const preview = document.getElementById(previewId);
        const file = input.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }

            reader.readAsDataURL(file);
        } else {
            preview.style.display = 'none';
        }
    }
</script>
