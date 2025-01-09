<div class="step hidden" id="step10">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Learner Senior Information</h2>
    <div class="space-y-6">
        <div>
            <label for="semester" class="block text-sm font-medium text-gray-700">Semester</label>
            <select id="semester" name="learner_senior[semester]" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <option value="1st">1st Semester</option>
                <option value="2nd">2nd Semester</option>
            </select>
        </div>
        <div>
            <label for="track" class="block text-sm font-medium text-gray-700">Track</label>
            <select id="track" name="learner_senior[track]" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                onchange="updateStrands()">
                <option value="">Select Track</option>
                <option value="Academic">Academic Track</option>
                <option value="Technical-Vocational-Livelihood">Technical-Vocational-Livelihood (TVL) Track</option>
            </select>
        </div>
        <div>
            <label for="strand" class="block text-sm font-medium text-gray-700">Strand</label>
            <select id="strand" name="learner_senior[strand]" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <option value="">Select Strand</option>
            </select>
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
<script>
    function updateStrands() {
        const track = document.getElementById('track').value;
        const strandSelect = document.getElementById('strand');
        strandSelect.innerHTML = '<option value="">Select Strand</option>';

        if (track === 'Academic') {
            strandSelect.innerHTML += '<option value="HUMSS">HUMSS</option>';
            strandSelect.innerHTML += '<option value="STEM">STEM</option>';
            strandSelect.innerHTML += '<option value="ABM">ABM</option>';
        } else if (track === 'Technical-Vocational-Livelihood') {
            strandSelect.innerHTML += '<option value="ICT">ICT</option>';
            strandSelect.innerHTML += '<option value="Home Economics">Home Economics</option>';
            strandSelect.innerHTML += '<option value="Agri-Fishery Arts">Agri-Fishery Arts</option>';
            strandSelect.innerHTML += '<option value="Industrial Arts">Industrial Arts</option>';
        }
    }
</script>
