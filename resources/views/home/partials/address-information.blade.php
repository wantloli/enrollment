<div class="step hidden" id="step5">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Address Information</h2>

    <!-- Home Address -->
    <div class="mb-8">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Home Address</h3>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div>
                <label for="home_house_no" class="block text-sm font-medium text-gray-700">House
                    Number</label>
                <input type="text" id="home_house_no" name="home_address[house_no]" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2"
                    oninput="this.value = this.value.toUpperCase()">
            </div>
            <div>
                <label for="home_street_name" class="block text-sm font-medium text-gray-700">Street
                    Name</label>
                <input type="text" id="home_street_name" name="home_address[street_name]" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2"
                    oninput="this.value = this.value.toUpperCase()">
            </div>
            <div>
                <label for="home_province" class="block text-sm font-medium text-gray-700">
                    Province
                </label>
                <input id="home_province" name="home_address[province]" type="text" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2"
                    placeholder="ENTER PROVINCE" oninput="this.value = this.value.toUpperCase()">
            </div>
            <div>
                <label for="home_municipality" class="block text-sm font-medium text-gray-700">
                    City/Municipality
                </label>
                <input id="home_municipality" name="home_address[municipality]" type="text" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2"
                    placeholder="ENTER CITY / MUNICIPALITY" oninput="this.value = this.value.toUpperCase()">
            </div>
            <div>
                <label for="home_country" class="block text-sm font-medium text-gray-700">Country</label>
                <input type="text" id="home_country" name="home_address[country]" value="PHILIPPINES" readonly
                    class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2">
            </div>
            <div>
                <label for="home_barangay" class="block text-sm font-medium text-gray-700">Barangay</label>
                <input type="text" id="home_barangay" name="home_address[barangay]" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2"
                    oninput="this.value = this.value.toUpperCase()">
            </div>
            <div>
                <label for="home_zip_code" class="block text-sm font-medium text-gray-700">Zip
                    Code</label>
                <input type="text" id="home_zip_code" name="home_address[zip_code]" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2"
                    oninput="this.value = this.value.toUpperCase()">
            </div>
        </div>
    </div>

    <!-- Current Address -->
    <div class="mb-4">
        <div class="flex items-center">
            <input type="checkbox" id="same_as_home" name="same_as_home" value="1"
                class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-500 focus:ring-blue-500">
            <label for="same_as_home" class="ml-2 block text-sm text-gray-700">Same as Home
                Address</label>
        </div>
    </div>

    <div id="current_address_section">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Current Address</h3>
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            <div>
                <label for="current_house_no" class="block text-sm font-medium text-gray-700">House
                    Number</label>
                <input type="text" id="current_house_no" name="current_address[house_no]"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2"
                    oninput="this.value = this.value.toUpperCase()">
            </div>
            <div>
                <label for="current_street_name" class="block text-sm font-medium text-gray-700">Street Name</label>
                <input type="text" id="current_street_name" name="current_address[street_name]"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2"
                    oninput="this.value = this.value.toUpperCase()">
            </div>
            <div>
                <label for="current_province" class="block text-sm font-medium text-gray-700">
                    Province
                </label>
                <input id="current_province" name="current_address[province]" type="text"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2"
                    placeholder="ENTER PROVINCE" oninput="this.value = this.value.toUpperCase()">
            </div>
            <div>
                <label for="current_municipality" class="block text-sm font-medium text-gray-700">
                    City/Municipality
                </label>
                <input id="current_municipality" name="current_address[municipality]" type="text"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2"
                    placeholder="Enter CITY / MUNICIPALITY" oninput="this.value = this.value.toUpperCase()">
            </div>
            <div>
                <label for="current_country" class="block text-sm font-medium text-gray-700">Country</label>
                <input type="text" id="current_country" name="current_address[country]" value="PHILIPPINES"
                    readonly
                    class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2">
            </div>
            <div>
                <label for="current_barangay" class="block text-sm font-medium text-gray-700">Barangay</label>
                <input type="text" id="current_barangay" name="current_address[barangay]"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2"
                    oninput="this.value = this.value.toUpperCase()">
            </div>
            <div>
                <label for="current_zip_code" class="block text-sm font-medium text-gray-700">Zip
                    Code</label>
                <input type="text" id="current_zip_code" name="current_address[zip_code]"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2"
                    oninput="this.value = this.value.toUpperCase()">
            </div>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sameAsHomeCheckbox = document.getElementById('same_as_home');
        const currentAddressSection = document.getElementById('current_address_section');
        const currentAddressFields = currentAddressSection.querySelectorAll('input');

        // Function to toggle current address fields
        function toggleCurrentAddressFields() {
            if (sameAsHomeCheckbox.checked) {
                // Hide the current address section and disable inputs
                currentAddressSection.classList.add('hidden');
                currentAddressFields.forEach(field => {
                    field.disabled = true;
                    field.removeAttribute('required');
                });
            } else {
                // Show the current address section and enable inputs
                currentAddressSection.classList.remove('hidden');
                currentAddressFields.forEach(field => {
                    field.disabled = false;
                    field.setAttribute('required', 'required');
                });
            }
        }

        // Initial state check
        toggleCurrentAddressFields();

        // Add event listener to the checkbox
        sameAsHomeCheckbox.addEventListener('change', toggleCurrentAddressFields);
    });
</script>
