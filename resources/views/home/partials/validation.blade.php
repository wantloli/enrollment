<script>
    function validateStep(stepNumber) {
        const currentStepElement = document.getElementById(`step${stepNumber}`);
        if (!currentStepElement) return true;

        // Skip validation for welcome and requirements steps
        if (stepNumber <= 2) return true;
        const requiredInputs = currentStepElement.querySelectorAll(
            'input[required], select[required], textarea[required]');
        let isValid = true;
        requiredInputs.forEach(input => {
            if (!input.value.trim()) {
                isValid = false;
                input.classList.add('border-red-500');
                showError(input, 'This field is required');
            } else {
                input.classList.remove('border-red-500');
                removeError(input);
            }
        });

        // Special validation for specific steps
        switch (stepNumber) {
            case 3: // School Information
                isValid = validateSchoolInfo() && isValid;
                break;
            case 4: // Personal Information
                isValid = validatePersonalInfo() && isValid;
                break;
            case 5: // Address
                isValid = validateAddress() && isValid;
                break;
            case 6: // Parent Information
                isValid = validateParentInfo() && isValid;
                break;
            case 7: // Special Needs
                isValid = validateSpecialNeeds() && isValid;
                break;
            case 8: // Learning Preferences
                isValid = validateLearningPreferences() && isValid;
                break;
            case 11: // Upload Requirements
                isValid = validateRequirements() && isValid;
                break;
        }

        if (!isValid) {
            showStepError(currentStepElement, 'Please fill in all required fields correctly');
        }

        return isValid;
    }

    // Validation functions for each step
    function validateSchoolInfo() {
        const lrnInput = document.getElementById('learners_reference_no');
        if (lrnInput && !/^\d{12}$/.test(lrnInput.value)) {
            showError(lrnInput, 'LRN must be 12 digits');
            return false;
        }
        return true;
    }

    function validatePersonalInfo() {
        const ageInput = document.getElementById('age');
        if (ageInput && (ageInput.value < 10 || ageInput.value < 0)) {
            showError(ageInput, 'Age must be at least 10 and not negative');
            return false;
        }
        return true;
    }

    function validateAddress() {
        // Add specific validations for address
        return true;
    }

    function validateParentInfo() {
        const fatherFirstName = document.getElementById('father_first_name');
        const fatherLastName = document.getElementById('father_last_name');
        const fatherMiddleName = document.getElementById('father_middle_name');
        const motherFirstName = document.getElementById('mother_first_name');
        const motherLastName = document.getElementById('mother_last_name');
        const motherMiddleName = document.getElementById('mother_middle_name');
        const legalFirstName = document.getElementById('legal_first_name');
        const legalLastName = document.getElementById('legal_last_name');
        const legalMiddleName = document.getElementById('legal_middle_name');

        if (!validateName(fatherFirstName) || !validateName(fatherLastName) || !validateName(fatherMiddleName) ||
            !validateName(motherFirstName) || !validateName(motherLastName) || !validateName(motherMiddleName) ||
            !validateName(legalFirstName) || !validateName(legalLastName) || !validateName(legalMiddleName)) {
            return false;
        }

        return true;
    }

    function validateName(input) {
        if (!input || !input.value.trim()) {
            return true;
        }
        const namePattern = /^[a-zA-Z\s\-]+$/;
        if (!namePattern.test(input.value)) {
            showError(input, 'Name must not contain symbols or numbers, except for hyphen (-)');
            return false;
        }
        return true;
    }

    function validateSpecialNeeds() {
        const hasSpecialNeeds = document.querySelector('input[name="has_special_needs"]:checked');
        if (!hasSpecialNeeds) {
            showStepError(document.getElementById('step7'), 'Please indicate if you have special needs');
            return false;
        }
        return true;
    }

    function validateLearningPreferences() {
        // Add specific validations for learning preferences
        return true;
    }

    function validateRequirements() {
        const birthCertificateInput = document.getElementById('birth_certificate');
        const grade10CardInput = document.getElementById('grade_10_card');
        let isValid = true;

        if (birthCertificateInput && birthCertificateInput.files[0]) {
            const file = birthCertificateInput.files[0];
            if (!['image/jpeg', 'image/png', 'image/jpg', 'image/gif'].includes(file.type) || file.size > 2048 * 1024) {
                showError(birthCertificateInput, 'File must be an image (jpeg, png, jpg, gif) and less than 2MB');
                isValid = false;
            }
        } else {
            showError(birthCertificateInput, 'This field is required');
            isValid = false;
        }

        if (grade10CardInput && grade10CardInput.files[0]) {
            const file = grade10CardInput.files[0];
            if (!['image/jpeg', 'image/png', 'image/jpg', 'image/gif'].includes(file.type) || file.size > 2048 * 1024) {
                showError(grade10CardInput, 'File must be an image (jpeg, png, jpg, gif) and less than 2MB');
                isValid = false;
            }
        } else {
            showError(grade10CardInput, 'This field is required');
            isValid = false;
        }

        return isValid;
    }
</script>
