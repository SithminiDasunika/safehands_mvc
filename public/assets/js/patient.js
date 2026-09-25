/*
|--------------------------------------------------------------------------
| SafeHands - Patient Form JavaScript
|--------------------------------------------------------------------------
| File:
| public/assets/js/patient.js
|
| Important:
| - This file handles the multi-step form UI.
| - It does NOT redirect after submission.
| - The PHP PatientController handles the final redirect.
|--------------------------------------------------------------------------
*/

(function () {

    'use strict';


    /*
    |--------------------------------------------------------------------------
    | Variables
    |--------------------------------------------------------------------------
    */

    let currentStep = 1;

    const totalSteps = 3;

    let medicalConditions = [];


    /*
    |--------------------------------------------------------------------------
    | DOM Ready
    |--------------------------------------------------------------------------
    */

    document.addEventListener('DOMContentLoaded', function () {

        initializeSteps();

        initializeTracker();

        setupMedicalConditions();

        setupProfilePhoto();

        setupMedicalDocument();

        setupFormSubmission();

    });


    /*
    |--------------------------------------------------------------------------
    | Initialize Steps
    |--------------------------------------------------------------------------
    */

    function initializeSteps() {

        showStep(currentStep);

    }


    /*
    |--------------------------------------------------------------------------
    | Show Step
    |--------------------------------------------------------------------------
    */

    function showStep(stepNumber) {

        const steps =
            document.querySelectorAll(
                '.step-transition'
            );

        steps.forEach(function (step) {

            step.classList.remove('active');
            step.classList.add('hidden');

            step.style.display = 'none';

        });


        /*
        | Try common IDs
        */

        let selectedStep =
            document.getElementById(
                'step-' + stepNumber + '-content'
            );


        /*
        | If IDs are not used, use .step-transition
        | according to position.
        */

        if (!selectedStep && steps.length >= stepNumber) {

            selectedStep =
                steps[stepNumber - 1];

        }


        if (selectedStep) {

            selectedStep.classList.add('active');
            selectedStep.classList.remove('hidden');

            selectedStep.style.display = '';

        }


        currentStep = stepNumber;

        updateTracker();

        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });

    }


    /*
    |--------------------------------------------------------------------------
    | Go To Step
    |--------------------------------------------------------------------------
    */

    window.goToStep = function (stepNumber) {

        stepNumber = parseInt(
            stepNumber,
            10
        );


        if (
            isNaN(stepNumber) ||
            stepNumber < 1 ||
            stepNumber > totalSteps
        ) {

            return;

        }


        /*
        | Going forward:
        | validate current step first.
        */

        if (stepNumber > currentStep) {

            if (
                !validateStep(currentStep)
            ) {

                return;

            }

        }


        showStep(stepNumber);

    };


    /*
    |--------------------------------------------------------------------------
    | Next Step
    |--------------------------------------------------------------------------
    */

    window.nextStep = function () {

        if (
            validateStep(currentStep)
        ) {

            if (
                currentStep < totalSteps
            ) {

                showStep(
                    currentStep + 1
                );

            }

        }

    };


    /*
    |--------------------------------------------------------------------------
    | Previous Step
    |--------------------------------------------------------------------------
    */

    window.previousStep = function () {

        if (currentStep > 1) {

            showStep(
                currentStep - 1
            );

        }

    };


    /*
    |--------------------------------------------------------------------------
    | Validate Step
    |--------------------------------------------------------------------------
    */

    function validateStep(stepNumber) {

        /*
        |--------------------------------------------------------------------------
        | Step 1
        |--------------------------------------------------------------------------
        */

        if (stepNumber === 1) {

            const fullName =
                document.getElementById(
                    'full_name'
                );

            const dateOfBirth =
                document.getElementById(
                    'date_of_birth'
                );

            const gender =
                document.getElementById(
                    'gender'
                );

            const relationship =
                document.getElementById(
                    'relationship'
                );


            if (
                fullName &&
                fullName.value.trim() === ''
            ) {

                showError(
                    fullName,
                    'Please enter the patient name.'
                );

                return false;

            }


            if (
                dateOfBirth &&
                dateOfBirth.value.trim() === ''
            ) {

                showError(
                    dateOfBirth,
                    'Please select the date of birth.'
                );

                return false;

            }


            /*
            | Do not allow future DOB
            */

            if (
                dateOfBirth &&
                dateOfBirth.value
            ) {

                const selectedDate =
                    new Date(
                        dateOfBirth.value
                    );

                const today =
                    new Date();

                today.setHours(
                    0,
                    0,
                    0,
                    0
                );


                if (
                    selectedDate > today
                ) {

                    showError(
                        dateOfBirth,
                        'Date of birth cannot be in the future.'
                    );

                    return false;

                }

            }


            if (
                gender &&
                gender.value.trim() === ''
            ) {

                showError(
                    gender,
                    'Please select the gender.'
                );

                return false;

            }


            if (
                relationship &&
                relationship.value.trim() === ''
            ) {

                showError(
                    relationship,
                    'Please select the relationship.'
                );

                return false;

            }


            /*
            | Validate profile photo
            */

            const profilePhoto =
                document.getElementById(
                    'profile_photo'
                );


            if (
                profilePhoto &&
                profilePhoto.files &&
                profilePhoto.files.length > 0
            ) {

                if (
                    !validateProfilePhoto(
                        profilePhoto
                    )
                ) {

                    return false;

                }

            }

        }


        /*
        |--------------------------------------------------------------------------
        | Step 2
        |--------------------------------------------------------------------------
        */

        if (stepNumber === 2) {

            updateMedicalConditions();

        }


        /*
        |--------------------------------------------------------------------------
        | Step 3
        |--------------------------------------------------------------------------
        */

        if (stepNumber === 3) {

            /*
            | Medical document is optional.
            | Only validate it if the user selected one.
            */

            const medicalDocument =
                document.getElementById(
                    'medical_document'
                );


            if (
                medicalDocument &&
                medicalDocument.files &&
                medicalDocument.files.length > 0
            ) {

                if (
                    !validateMedicalDocument(
                        medicalDocument
                    )
                ) {

                    return false;

                }

            }

        }


        return true;

    }


    /*
    |--------------------------------------------------------------------------
    | Show Validation Error
    |--------------------------------------------------------------------------
    */

    function showError(
        element,
        message
    ) {

        if (!element) {

            alert(message);

            return;

        }


        alert(message);

        element.focus();

        element.classList.add(
            'error'
        );


        setTimeout(
            function () {

                element.classList.remove(
                    'error'
                );

            },
            3000
        );

    }


    /*
    |--------------------------------------------------------------------------
    | Initialize Tracker
    |--------------------------------------------------------------------------
    */

    function initializeTracker() {

        updateTracker();

    }


    /*
    |--------------------------------------------------------------------------
    | Update Tracker
    |--------------------------------------------------------------------------
    */

    function updateTracker() {

        /*
        | Common tracker selectors
        */

        const trackerItems =
            document.querySelectorAll(
                '.step-item, .step, .progress-step'
            );


        trackerItems.forEach(
            function (item, index) {

                const stepNumber =
                    index + 1;


                item.classList.remove(
                    'active'
                );

                item.classList.remove(
                    'completed'
                );


                if (
                    stepNumber === currentStep
                ) {

                    item.classList.add(
                        'active'
                    );

                }


                if (
                    stepNumber < currentStep
                ) {

                    item.classList.add(
                        'completed'
                    );

                }

            }
        );


        /*
        | Update elements that contain
        | data-step attributes.
        */

        const dataSteps =
            document.querySelectorAll(
                '[data-step]'
            );


        dataSteps.forEach(
            function (item) {

                const number =
                    parseInt(
                        item.dataset.step,
                        10
                    );


                item.classList.remove(
                    'active'
                );

                item.classList.remove(
                    'completed'
                );


                if (
                    number === currentStep
                ) {

                    item.classList.add(
                        'active'
                    );

                }


                if (
                    number < currentStep
                ) {

                    item.classList.add(
                        'completed'
                    );

                }

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | Medical Conditions
    |--------------------------------------------------------------------------
    */

    function setupMedicalConditions() {

        const conditionInput =
            document.getElementById(
                'medical_condition_input'
            );

        const addButton =
            document.getElementById(
                'addMedicalCondition'
            );

        const hiddenInput =
            document.getElementById(
                'medical_conditions'
            );


        /*
        | Load existing conditions
        */

        if (
            hiddenInput &&
            hiddenInput.value.trim() !== ''
        ) {

            medicalConditions =
                hiddenInput.value
                    .split(',')
                    .map(
                        function (item) {
                            return item.trim();
                        }
                    )
                    .filter(
                        function (item) {
                            return item !== '';
                        }
                    );

        }


        /*
        | Add button
        */

        if (
            addButton &&
            conditionInput
        ) {

            addButton.addEventListener(
                'click',
                function (event) {

                    event.preventDefault();

                    addMedicalCondition();

                }
            );


            /*
            | Allow Enter key
            */

            conditionInput.addEventListener(
                'keydown',
                function (event) {

                    if (
                        event.key === 'Enter'
                    ) {

                        event.preventDefault();

                        addMedicalCondition();

                    }

                }
            );

        }


        renderMedicalConditions();

    }


    /*
    |--------------------------------------------------------------------------
    | Add Medical Condition
    |--------------------------------------------------------------------------
    */

    function addMedicalCondition() {

        const input =
            document.getElementById(
                'medical_condition_input'
            );


        if (!input) {

            return;

        }


        const value =
            input.value.trim();


        if (value === '') {

            return;

        }


        /*
        | Prevent duplicates
        */

        const alreadyExists =
            medicalConditions.some(
                function (condition) {

                    return (
                        condition.toLowerCase() ===
                        value.toLowerCase()
                    );

                }
            );


        if (!alreadyExists) {

            medicalConditions.push(
                value
            );

        }


        input.value = '';

        renderMedicalConditions();

    }


    /*
    |--------------------------------------------------------------------------
    | Remove Medical Condition
    |--------------------------------------------------------------------------
    */

    window.removeMedicalCondition =
        function (index) {

            medicalConditions.splice(
                index,
                1
            );

            renderMedicalConditions();

        };


    /*
    |--------------------------------------------------------------------------
    | Render Medical Conditions
    |--------------------------------------------------------------------------
    */

    function renderMedicalConditions() {

        const container =
            document.getElementById(
                'medicalConditionsList'
            );


        const hiddenInput =
            document.getElementById(
                'medical_conditions'
            );


        /*
        | Store as plain TEXT.
        |
        | Your database column is TEXT,
        | so do not use JSON here.
        */

        if (hiddenInput) {

            hiddenInput.value =
                medicalConditions.join(', ');

        }


        if (!container) {

            return;

        }


        container.innerHTML = '';


        medicalConditions.forEach(
            function (condition, index) {

                const item =
                    document.createElement(
                        'div'
                    );


                item.className =
                    'medical-condition-item';


                const text =
                    document.createElement(
                        'span'
                    );


                text.textContent =
                    condition;


                const removeButton =
                    document.createElement(
                        'button'
                    );


                removeButton.type =
                    'button';


                removeButton.textContent =
                    'Remove';


                removeButton.addEventListener(
                    'click',
                    function () {

                        removeMedicalCondition(
                            index
                        );

                    }
                );


                item.appendChild(text);

                item.appendChild(
                    removeButton
                );

                container.appendChild(
                    item
                );

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | Update Medical Conditions
    |--------------------------------------------------------------------------
    */

    function updateMedicalConditions() {

        const hiddenInput =
            document.getElementById(
                'medical_conditions'
            );


        if (hiddenInput) {

            hiddenInput.value =
                medicalConditions.join(', ');

        }

    }


    /*
    |--------------------------------------------------------------------------
    | Profile Photo
    |--------------------------------------------------------------------------
    */

    function setupProfilePhoto() {

        const input =
            document.getElementById(
                'profile_photo'
            );


        if (!input) {

            return;

        }


        input.addEventListener(
            'change',
            function () {

                validateProfilePhoto(
                    input
                );

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | Validate Profile Photo
    |--------------------------------------------------------------------------
    */

    function validateProfilePhoto(input) {

        if (
            !input.files ||
            input.files.length === 0
        ) {

            return true;

        }


        const file =
            input.files[0];


        const allowedTypes = [
            'image/jpeg',
            'image/png'
        ];


        if (
            !allowedTypes.includes(
                file.type
            )
        ) {

            alert(
                'Profile photo must be JPG or PNG.'
            );

            input.value = '';

            return false;

        }


        const maxSize =
            2 * 1024 * 1024;


        if (
            file.size > maxSize
        ) {

            alert(
                'Profile photo must be less than 2MB.'
            );

            input.value = '';

            return false;

        }


        /*
        | Optional preview
        */

        const preview =
            document.getElementById(
                'profilePhotoPreview'
            );


        if (
            preview
        ) {

            const reader =
                new FileReader();


            reader.onload =
                function (event) {

                    preview.src =
                        event.target.result;

                    preview.style.display =
                        'block';

                };


            reader.readAsDataURL(
                file
            );

        }


        return true;

    }


    /*
    |--------------------------------------------------------------------------
    | Medical Document
    |--------------------------------------------------------------------------
    */

    function setupMedicalDocument() {

        const input =
            document.getElementById(
                'medical_document'
            );


        if (!input) {

            return;

        }


        input.addEventListener(
            'change',
            function () {

                validateMedicalDocument(
                    input
                );

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | Validate Medical Document
    |--------------------------------------------------------------------------
    */

    function validateMedicalDocument(input) {

        if (
            !input.files ||
            input.files.length === 0
        ) {

            return true;

        }


        const file =
            input.files[0];


        const allowedExtensions = [
            'pdf',
            'jpg',
            'jpeg',
            'png'
        ];


        const fileName =
            file.name.toLowerCase();


        const extension =
            fileName
                .split('.')
                .pop();


        if (
            !allowedExtensions.includes(
                extension
            )
        ) {

            alert(
                'Medical document must be PDF, JPG, JPEG, or PNG.'
            );

            input.value = '';

            return false;

        }


        const maxSize =
            5 * 1024 * 1024;


        if (
            file.size > maxSize
        ) {

            alert(
                'Medical document must be less than 5MB.'
            );

            input.value = '';

            return false;

        }


        return true;

    }


    /*
    |--------------------------------------------------------------------------
    | Form Submission
    |--------------------------------------------------------------------------
    */

    function setupFormSubmission() {

        const form =
            document.getElementById(
                'patientForm'
            );


        if (!form) {

            return;

        }


        form.addEventListener(
            'submit',
            function (event) {

                /*
                |--------------------------------------------------------------------------
                | VERY IMPORTANT
                |--------------------------------------------------------------------------
                |
                | We DO NOT call:
                |
                | event.preventDefault()
                |
                | when the form is valid.
                |
                | The browser must submit the form
                | normally to:
                |
                | /safehands_mvc/patient/store
                |
                | PHP will then create the patient
                | and redirect using the new ID.
                |--------------------------------------------------------------------------
                */


                /*
                | Validate every step
                */

                for (
                    let step = 1;
                    step <= totalSteps;
                    step++
                ) {

                    if (
                        !validateStep(step)
                    ) {

                        /*
                        | Stop normal submission
                        | only when validation fails.
                        */

                        event.preventDefault();

                        showStep(step);

                        return;

                    }

                }


                /*
                | Make sure medical conditions
                | are copied to hidden input.
                */

                updateMedicalConditions();


                /*
                | Validate medical document.
                */

                const medicalDocument =
                    document.getElementById(
                        'medical_document'
                    );


                if (
                    medicalDocument &&
                    medicalDocument.files &&
                    medicalDocument.files.length > 0
                ) {

                    if (
                        !validateMedicalDocument(
                            medicalDocument
                        )
                    ) {

                        event.preventDefault();

                        showStep(3);

                        return;

                    }

                }


                /*
                |--------------------------------------------------------------------------
                | IMPORTANT:
                |
                | DO NOT REDIRECT HERE.
                |
                | DO NOT use:
                |
                | window.location.href =
                | "/safehands_mvc/patient/profile";
                |
                | PHP handles the redirect.
                |--------------------------------------------------------------------------
                */


                /*
                | Show submitting state.
                */

                const submitButton =
                    form.querySelector(
                        'button[type="submit"], input[type="submit"]'
                    );


                if (submitButton) {

                    submitButton.disabled =
                        true;


                    if (
                        submitButton.tagName
                        .toLowerCase() ===
                        'button'
                    ) {

                        submitButton.textContent =
                            'Creating...';

                    }

                }


                /*
                | IMPORTANT:
                |
                | There is NO event.preventDefault()
                | here.
                |
                | The form will now submit normally.
                */

            }
        );

    }


    /*
    |--------------------------------------------------------------------------
    | Format File Size
    |--------------------------------------------------------------------------
    */

    function formatFileSize(bytes) {

        if (
            bytes === 0
        ) {

            return '0 Bytes';

        }


        const units = [
            'Bytes',
            'KB',
            'MB',
            'GB'
        ];


        const i =
            Math.floor(
                Math.log(bytes) /
                Math.log(1024)
            );


        return (
            parseFloat(
                (
                    bytes /
                    Math.pow(
                        1024,
                        i
                    )
                ).toFixed(2)
            ) +
            ' ' +
            units[i]
        );

    }


    /*
    |--------------------------------------------------------------------------
    | Make Functions Available Globally
    |--------------------------------------------------------------------------
    */

    window.formatFileSize =
        formatFileSize;


})();