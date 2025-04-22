@include('components.toast')

<div class="step hidden" id="step11">
    <h2 class="text-2xl font-bold text-gray-900 mb-6">Upload Requirements</h2>
    <div class="space-y-6">
        <div>
            <label for="birth_certificate" class="block text-sm font-medium text-gray-700">Birth Certificate</label>
            <p class="text-xs text-gray-500 mb-2">
                You can upload an image up to <span class="font-semibold">30MB</span> in size.<br>
                Larger images (10MB+) may take more time to process. Please be patient.<br>
                Make sure the text <span class="font-semibold">CERTIFICATE OF LIVE BIRTH</span> is clearly recognizable
                and readable in your upload.
            </p>
            <input type="file" id="birth_certificate" name="requirements[birth_certificate]" accept="image/*" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                onchange="previewImage(this, 'birth_certificate_preview')">
            <img id="birth_certificate_preview" class="mt-2 h-40 w-full object-cover rounded-md" style="display:none;">

            {{-- OCR recognized text for Birth Certificate (for debugging) --}}
            {{--
            <div id="birth_certificate_text" class="mt-2 p-4 bg-gray-100 rounded-md text-sm hidden">
                <p class="font-semibold">Recognized Text:</p>
                <pre class="whitespace-pre-wrap"></pre>
            </div>
            --}}
            <div id="birth_certificate_status" class="mt-2 text-sm hidden">
                <div class="flex items-center">
                    <svg class="animate-spin h-5 w-5 text-blue-500 mr-2" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    <span>Processing document...</span>
                </div>
            </div>
        </div>
        <div>
            <label for="grade_10_card" class="block text-sm font-medium text-gray-700">Grade 10 Card</label>
            <input type="file" id="grade_10_card" name="requirements[grade_10_card]" accept="image/*" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                onchange="previewImage(this, 'grade_10_card_preview')">
            <img id="grade_10_card_preview" class="mt-2 h-40 w-full object-cover rounded-md" style="display:none;">

            {{-- OCR recognized text for Grade 10 Card (for debugging) --}}
            {{--
            <div id="grade_10_card_text" class="mt-2 p-4 bg-gray-100 rounded-md text-sm hidden">
                <p class="font-semibold">Recognized Text:</p>
                <pre class="whitespace-pre-wrap"></pre>
            </div>
            --}}
            <div id="grade_10_card_status" class="mt-2 text-sm hidden">
                <div class="flex items-center">
                    <svg class="animate-spin h-5 w-5 text-blue-500 mr-2" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor"
                            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                        </path>
                    </svg>
                    <span>Processing document...</span>
                </div>
            </div>
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

<script src="https://cdn.jsdelivr.net/npm/tesseract.js/dist/tesseract.min.js"></script>
<script>
    const requiredFields = {
        birth_certificate: [
            "CERTIFICATE OF LIVE BIRTH",
        ],
        grade_10_card: [
            "English",
        ]
    };

    function previewImage(input, previewId) {
        const preview = document.getElementById(previewId);
        const status = document.getElementById(input.id + '_status');
        // const textDiv = document.getElementById(input.id + '_text'); // For debugging
        const file = input.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                status.classList.remove('hidden');
                // if (textDiv) textDiv.classList.add('hidden'); // For debugging

                Tesseract.recognize(
                    e.target.result,
                    'eng'
                ).then(({
                    data: {
                        text
                    }
                }) => {
                    status.classList.add('hidden');
                    const inputId = input.id;
                    const fields = requiredFields[inputId];

                    // Display recognized text (for debugging)
                    // if (textDiv) {
                    //     textDiv.querySelector('pre').textContent = text;
                    //     textDiv.classList.remove('hidden');
                    // }

                    if (fields && !areFieldsPresent(text, fields)) {
                        showToast(
                            `The uploaded ${inputId.replace('_', ' ')} appears to be invalid or missing required information. Please check and try again.`,
                            'error');
                        preview.style.display = 'none';
                        input.value = ''; // Clear the file input
                    } else {
                        showToast(`${inputId.replace('_', ' ')} validated successfully!`, 'success');
                    }
                }).catch(err => {
                    status.classList.add('hidden');
                    console.error("OCR Error:", err);
                    showToast('Error processing document. Please try again.', 'error');
                });
            };

            reader.readAsDataURL(file);
        } else {
            preview.style.display = 'none';
            status.classList.add('hidden');
        }
    }

    function areFieldsPresent(text, fields) {
        const normalizedText = text.replace(/\s+/g, '').toLowerCase();
        return fields.every(field => {
            const normalizedField = field.replace(/\s+/g, '').toLowerCase();
            return normalizedText.includes(normalizedField);
        });
    }
</script>
