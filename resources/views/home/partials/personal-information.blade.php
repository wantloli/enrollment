<div class="step hidden" id="step4">
    <h2 class="text-2xl font-bold text-gray-900 mb-8 border-b pb-2">Personal Information</h2>
    <div class="mb-4 text-sm text-gray-600">
        Fields marked as optional can be left blank if not applicable.
    </div>

    <div class="grid grid-cols-1 gap-6">
        <!-- Single column for Birth Certificate -->
        <div class="space-y-2">
            <label for="birth_certificate_no" class="block text-sm font-semibold text-gray-700">
                Birth Certificate No. (Optional only if no PSA)
            </label>
            <input type="text" id="birth_certificate_no" name="birth_certificate_no"
                class="w-full px-4 py-2 rounded-md border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors"
                oninput="this.value = this.value.toUpperCase()">
        </div>

        <!-- Three columns for name fields -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="space-y-2">
                <label for="last_name" class="block text-sm font-semibold text-gray-700">Last Name</label>
                <input type="text" id="last_name" name="last_name" required placeholder="DELA CRUZ"
                    class="w-full px-4 py-2 rounded-md border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors"
                    oninput="this.value = this.value.toUpperCase()">
            </div>

            <div class="space-y-2">
                <label for="first_name" class="block text-sm font-semibold text-gray-700">First Name</label>
                <input type="text" id="first_name" name="first_name" required placeholder="JUAN"
                    class="w-full px-4 py-2 rounded-md border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors"
                    oninput="this.value = this.value.toUpperCase()">
            </div>

            <div class="space-y-2">
                <label for="middle_name" class="block text-sm font-semibold text-gray-700">Middle Name</label>
                <input type="text" id="middle_name" name="middle_name" placeholder="SANTOS"
                    class="w-full px-4 py-2 rounded-md border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors"
                    oninput="this.value = this.value.toUpperCase()">
            </div>
            <div class="space-y-2">
                <label for="extension_name" class="block text-sm font-semibold text-gray-700">Extension Name</label>
                <input type="text" id="extension_name" name="extension_name" placeholder="JR."
                    class="w-full px-4 py-2 rounded-md border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors capitalize"
                    oninput="this.value = this.value.toUpperCase()">
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="space-y-2">
                <label for="birth_place" class="block text-sm font-semibold text-gray-700">Birth Place</label>
                <input type="text" id="birth_place" name="birth_place" required
                    class="w-full px-4 py-2 rounded-md border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors capitalize"
                    oninput="this.value = this.value.toUpperCase()">
            </div>
            <div class="space-y-2">
                <label for="birth_date" class="block text-sm font-semibold text-gray-700">Birth Date(DD/MM/YYYY)</label>
                <input type="date" id="birth_date" name="birth_date" required
                    class="w-full px-4 py-2 rounded-md border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors"
                    onchange="calculateAge()">
            </div>

            <div class="space-y-2">
                <label for="age" class="block text-sm font-semibold text-gray-700">Age</label>
                <input type="number" id="age" name="age" required readonly
                    class="w-full px-4 py-2 rounded-md border border-gray-300 bg-gray-50 cursor-not-allowed">
            </div>
        </div>


        <!-- Continue with remaining fields in 2 columns -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div class="space-y-2">
                <label for="sex" class="block text-sm font-semibold text-gray-700">Sex</label>
                <select id="sex" name="sex" required
                    class="w-full px-4 py-2 rounded-md border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors capitalize">
                    <option value="">Select sex</option>
                    <option value="MALE">MALE</option>
                    <option value="FEMALE">FEMALE</option>
                </select>
            </div>

            <div class="space-y-2">
                <label for="religion" class="block text-sm font-semibold text-gray-700">Religion</label>
                <input type="text" id="religion" name="religion" required
                    class="w-full px-4 py-2 rounded-md border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors capitalize"
                    oninput="this.value = this.value.toUpperCase()">
            </div>

            <div class="form-group">
                <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="space-y-2">
                <label for="mother_tongue" class="block text-sm font-semibold text-gray-700">Mother Tongue</label>
                <input type="text" id="mother_tongue" name="mother_tongue" required
                    class="w-full px-4 py-2 rounded-md border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors capitalize"
                    oninput="this.value = this.value.toUpperCase()">
            </div>

            <div class="space-y-2">
                <label for="four_ps_household_number" class="block text-sm font-semibold text-gray-700">
                    4Ps Household Number (Optional only if 4PS member)
                </label>
                <input type="text" id="four_ps_household_number" name="four_ps_household_number"
                    class="w-full px-4 py-2 rounded-md border border-gray-300 focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition-colors capitalize"
                    oninput="this.value = this.value.toUpperCase()">
            </div>
        </div>

    </div>

    <div class="mt-8 flex justify-between">
        <button type="button" onclick="prevStep(4)"
            class="px-6 py-2 bg-gray-100 text-gray-700 rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-300 transition-colors inline-flex items-center space-x-2">
            <span>←</span>
            <span>Back</span>
        </button>

        <button type="button" onclick="nextStep(4)"
            class="px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300 transition-colors inline-flex items-center space-x-2">
            <span>Continue</span>
            <span>→</span>
        </button>
    </div>
</div>

<script>
    function calculateAge() {
        const birthDate = document.getElementById('birth_date').value;
        const ageInput = document.getElementById('age');

        if (birthDate) {
            const today = new Date();
            const birthDateObj = new Date(birthDate);

            let age = today.getFullYear() - birthDateObj.getFullYear();
            const monthDiff = today.getMonth() - birthDateObj.getMonth();

            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDateObj.getDate())) {
                age--;
            }

            if (age < 10 || age < 0) {
                ageInput.value = '';
                showError(ageInput, 'Age must be at least 10 and not negative');
            } else {
                ageInput.value = age;
            }
        } else {
            ageInput.value = '';
        }
    }
</script>
