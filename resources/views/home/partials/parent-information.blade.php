<div class="step hidden" id="step6">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Parent Information</h2>

    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
        <!-- Father Information -->
        <div class="col-span-1 md:col-span-2">
            <h3 class="text-xl font-semibold text-gray-800">Father Information</h3>
        </div>
        <div>
            <label for="father_last_name" class="block text-sm font-medium text-gray-700">Father's Last Name</label>
            <input type="text" id="father_last_name" name="father_last_name"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                oninput="this.value = this.value.toUpperCase()">
        </div>
        <div>
            <label for="father_first_name" class="block text-sm font-medium text-gray-700">Father's First Name</label>
            <input type="text" id="father_first_name" name="father_first_name"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                oninput="this.value = this.value.toUpperCase()">
        </div>
        <div>
            <label for="father_middle_name" class="block text-sm font-medium text-gray-700">Father's Middle Name</label>
            <input type="text" id="father_middle_name" name="father_middle_name"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                oninput="this.value = this.value.toUpperCase()">
        </div>
        <div>
            <label for="father_contact_number" class="block text-sm font-medium text-gray-700">Father's Contact
                Number</label>
            <input type="tel" id="father_contact_number" name="father_contact_number"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                oninput="this.value = this.value.toUpperCase()">
        </div>

        <!-- Mother Information -->
        <div class="col-span-1 md:col-span-2">
            <h3 class="text-xl font-semibold text-gray-800">Mother Information</h3>
        </div>
        <div>
            <label for="mother_last_name" class="block text-sm font-medium text-gray-700">Mother's Last Name</label>
            <input type="text" id="mother_last_name" name="mother_last_name"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                oninput="this.value = this.value.toUpperCase()">
        </div>
        <div>
            <label for="mother_first_name" class="block text-sm font-medium text-gray-700">Mother's First Name</label>
            <input type="text" id="mother_first_name" name="mother_first_name"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                oninput="this.value = this.value.toUpperCase()">
        </div>
        <div>
            <label for="mother_middle_name" class="block text-sm font-medium text-gray-700">Mother's Middle Name</label>
            <input type="text" id="mother_middle_name" name="mother_middle_name"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                oninput="this.value = this.value.toUpperCase()">
        </div>
        <div>
            <label for="mother_contact_number" class="block text-sm font-medium text-gray-700">Mother's Contact
                Number</label>
            <input type="tel" id="mother_contact_number" name="mother_contact_number"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                oninput="this.value = this.value.toUpperCase()">
        </div>

        <!-- Legal Guardian Information -->
        <div class="col-span-1 md:col-span-2">
            <h3 class="text-xl font-semibold text-gray-800">Legal Guardian Information</h3>
        </div>
        <div>
            <label for="legal_last_name" class="block text-sm font-medium text-gray-700">Legal Guardian's Last
                Name</label>
            <input type="text" id="legal_last_name" name="legal_last_name"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                oninput="this.value = this.value.toUpperCase()" required>
        </div>
        <div>
            <label for="legal_first_name" class="block text-sm font-medium text-gray-700">Legal Guardian's First
                Name</label>
            <input type="text" id="legal_first_name" name="legal_first_name"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                oninput="this.value = this.value.toUpperCase()" required>
        </div>
        <div>
            <label for="legal_middle_name" class="block text-sm font-medium text-gray-700">Legal Guardian's Middle
                Name</label>
            <input type="text" id="legal_middle_name" name="legal_middle_name"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                oninput="this.value = this.value.toUpperCase()" required>
        </div>
        <div>
            <label for="legal_contact_number" class="block text-sm font-medium text-gray-700">Legal Guardian's Contact
                Number</label>
            <input type="tel" id="legal_contact_number" name="legal_contact_number"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                oninput="this.value = this.value.toUpperCase()" required>
        </div>
    </div>

    <div class="mt-8 flex justify-between">
        <button type="button" onclick="prevStep(6)"
            class="inline-flex items-center px-4 py-2 border border-gray-300 text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
            ← Back
        </button>
        <button type="button" onclick="nextStep(6)"
            class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">
            Continue →
        </button>
    </div>
</div>
