/*
|--------------------------------------------------------------------------
| SafeHands - Add Patient
|--------------------------------------------------------------------------
|
| FRONTEND ONLY
|
| Handles:
|
| 1. Multi-step navigation
| 2. Step validation
| 3. Progress tracker
| 4. Medical condition selection
| 5. Add custom medical condition
| 6. Profile photo validation
| 7. Medical document validation
| 8. Frontend-only patient creation
| 9. Temporary sessionStorage
|
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| CURRENT STEP
|--------------------------------------------------------------------------
*/

var currentStep = 1;


/*
|--------------------------------------------------------------------------
| GO TO STEP
|--------------------------------------------------------------------------
*/

function goToStep(stepNumber) {

    stepNumber = parseInt(stepNumber);


    /*
    |--------------------------------------------------------------------------
    | Only allow steps 1, 2 and 3
    |--------------------------------------------------------------------------
    */

    if (
        stepNumber < 1 ||
        stepNumber > 3
    ) {

        return;

    }


    /*
    |--------------------------------------------------------------------------
    | When moving forward,
    | validate current step
    |--------------------------------------------------------------------------
    */

    if (
        stepNumber > currentStep
    ) {

        if (
            !validateStep(currentStep)
        ) {

            return;

        }

    }


    /*
    |--------------------------------------------------------------------------
    | Hide all steps
    |--------------------------------------------------------------------------
    */

    var steps =
        document.querySelectorAll(
            '[id^="step-"][id$="-content"]'
        );


    steps.forEach(
        function (section) {

            section.classList.add(
                "hidden"
            );

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Find target step
    |--------------------------------------------------------------------------
    */

    var target =
        document.getElementById(
            "step-" +
            stepNumber +
            "-content"
        );


    if (!target) {

        console.error(
            "Step " +
            stepNumber +
            " could not be found."
        );

        return;

    }


    /*
    |--------------------------------------------------------------------------
    | Show target step
    |--------------------------------------------------------------------------
    */

    target.classList.remove(
        "hidden"
    );


    /*
    |--------------------------------------------------------------------------
    | Update current step
    |--------------------------------------------------------------------------
    */

    currentStep =
        stepNumber;


    /*
    |--------------------------------------------------------------------------
    | Update progress tracker
    |--------------------------------------------------------------------------
    */

    updateTracker(
        currentStep
    );


    /*
    |--------------------------------------------------------------------------
    | Scroll to form
    |--------------------------------------------------------------------------
    */

    var form =
        document.getElementById(
            "patientForm"
        );


    if (form) {

        window.scrollTo({

            top:
                form.offsetTop - 80,

            behavior:
                "smooth"

        });

    }

}


/*
|--------------------------------------------------------------------------
| VALIDATE STEP
|--------------------------------------------------------------------------
*/

function validateStep(stepNumber) {


    /*
    |--------------------------------------------------------------------------
    | STEP 1
    |--------------------------------------------------------------------------
    */

    if (
        stepNumber === 1
    ) {

        var requiredFields = [

            {
                id: "full_name",
                name: "Full Name"
            },

            {
                id: "date_of_birth",
                name: "Date of Birth"
            },

            {
                id: "gender",
                name: "Gender"
            },

            {
                id: "relationship",
                name: "Relationship"
            }

        ];


        /*
        |--------------------------------------------------------------------------
        | Check required fields
        |--------------------------------------------------------------------------
        */

        for (
            var i = 0;
            i < requiredFields.length;
            i++
        ) {

            var field =
                document.getElementById(
                    requiredFields[i].id
                );


            if (!field) {

                continue;

            }


            if (
                field.value.trim() === ""
            ) {

                alert(
                    "Please complete " +
                    requiredFields[i].name +
                    " before continuing."
                );


                field.focus();


                field.classList.add(
                    "input-error"
                );


                setTimeout(
                    function (element) {

                        element.classList.remove(
                            "input-error"
                        );

                    },

                    2000,

                    field

                );


                return false;

            }

        }


        /*
        |--------------------------------------------------------------------------
        | Validate profile photo
        |--------------------------------------------------------------------------
        */

        var photo =
            document.getElementById(
                "profile_photo"
            );


        if (
            photo &&
            photo.files &&
            photo.files.length > 0
        ) {

            var photoFile =
                photo.files[0];


            /*
            |--------------------------------------------------------------------------
            | Allowed image types
            |--------------------------------------------------------------------------
            */

            var allowedPhotoTypes = [

                "image/jpeg",

                "image/png"

            ];


            if (
                allowedPhotoTypes.indexOf(
                    photoFile.type
                ) === -1
            ) {

                alert(
                    "Profile photo must be JPG or PNG."
                );


                photo.value = "";


                return false;

            }


            /*
            |--------------------------------------------------------------------------
            | Maximum 2 MB
            |--------------------------------------------------------------------------
            */

            if (
                photoFile.size >
                2 * 1024 * 1024
            ) {

                alert(
                    "Profile photo must be smaller than 2 MB."
                );


                photo.value = "";


                return false;

            }

        }


        return true;

    }


    /*
    |--------------------------------------------------------------------------
    | STEP 2
    |--------------------------------------------------------------------------
    |
    | All medical fields are currently optional.
    |
    */

    if (
        stepNumber === 2
    ) {

        updateMedicalConditions();

        return true;

    }


    /*
    |--------------------------------------------------------------------------
    | STEP 3
    |--------------------------------------------------------------------------
    |
    | Emergency fields are currently optional.
    |
    */

    if (
        stepNumber === 3
    ) {

        return true;

    }


    return true;

}


/*
|--------------------------------------------------------------------------
| UPDATE PROGRESS TRACKER
|--------------------------------------------------------------------------
*/

function updateTracker(stepNumber) {


    for (
        var i = 1;
        i <= 3;
        i++
    ) {

        var stepItem =
            document.getElementById(
                "step-item-" + i
            );


        var label =
            document.getElementById(
                "label-" + i
            );


        if (
            !stepItem ||
            !label
        ) {

            continue;

        }


        /*
        |--------------------------------------------------------------------------
        | COMPLETED STEP
        |--------------------------------------------------------------------------
        */

        if (
            i < stepNumber
        ) {

            stepItem.classList.add(
                "completed"
            );


            stepItem.classList.remove(
                "active"
            );


            label.innerHTML =
                "✓";

        }


        /*
        |--------------------------------------------------------------------------
        | CURRENT STEP
        |--------------------------------------------------------------------------
        */

        else if (
            i === stepNumber
        ) {

            stepItem.classList.add(
                "active"
            );


            stepItem.classList.remove(
                "completed"
            );


            label.innerHTML =
                i;

        }


        /*
        |--------------------------------------------------------------------------
        | FUTURE STEP
        |--------------------------------------------------------------------------
        */

        else {

            stepItem.classList.remove(
                "active"
            );


            stepItem.classList.remove(
                "completed"
            );


            label.innerHTML =
                i;

        }

    }

}


/*
|--------------------------------------------------------------------------
| MEDICAL CONDITIONS
|--------------------------------------------------------------------------
*/

function setupMedicalConditions() {


    var container =
        document.getElementById(
            "medicalConditionsTags"
        );


    var hiddenInput =
        document.getElementById(
            "medical_conditions"
        );


    if (
        !container ||
        !hiddenInput
    ) {

        return;

    }


    /*
    |--------------------------------------------------------------------------
    | Existing condition buttons
    |--------------------------------------------------------------------------
    */

    var buttons =
        container.querySelectorAll(
            ".condition-tag"
        );


    buttons.forEach(
        function (button) {

            button.addEventListener(
                "click",
                function () {

                    /*
                    | Don't treat Add Condition
                    | button as a condition.
                    */

                    if (
                        button.id ===
                        "addConditionButton"
                    ) {

                        return;

                    }


                    button.classList.toggle(
                        "selected"
                    );


                    updateMedicalConditions();

                }
            );

        }
    );


    /*
    |--------------------------------------------------------------------------
    | Add condition button
    |--------------------------------------------------------------------------
    */

    var addButton =
        document.getElementById(
            "addConditionButton"
        );


    if (addButton) {

        addButton.addEventListener(
            "click",
            function (event) {

                


                var condition =
                    prompt(
                        "Enter a medical condition:"
                    );


                if (
                    !condition
                ) {

                    return;

                }


                condition =
                    condition.trim();


                if (
                    condition === ""
                ) {

                    return;

                }


                /*
                |--------------------------------------------------------------------------
                | Check duplicate
                |--------------------------------------------------------------------------
                */

                var allConditions =
                    container.querySelectorAll(
                        ".condition-tag"
                    );


                var duplicate =
                    false;


                allConditions.forEach(
                    function (button) {

                        if (
                            button.id ===
                            "addConditionButton"
                        ) {

                            return;

                        }


                        var existing =
                            button.getAttribute(
                                "data-condition"
                            );


                        if (
                            existing &&
                            existing.toLowerCase() ===
                            condition.toLowerCase()
                        ) {

                            duplicate =
                                true;

                        }

                    }
                );


                if (
                    duplicate
                ) {

                    alert(
                        "This condition already exists."
                    );


                    return;

                }


                /*
                |--------------------------------------------------------------------------
                | Create new condition
                |--------------------------------------------------------------------------
                */

                var newButton =
                    document.createElement(
                        "button"
                    );


                newButton.type =
                    "button";


                newButton.className =
                    "condition-tag selected";


                newButton.setAttribute(
                    "data-condition",
                    condition
                );


                newButton.textContent =
                    condition;


                /*
                |--------------------------------------------------------------------------
                | Put before Add Condition
                |--------------------------------------------------------------------------
                */

                container.insertBefore(
                    newButton,
                    addButton
                );


                /*
                |--------------------------------------------------------------------------
                | Click event
                |--------------------------------------------------------------------------
                */

                newButton.addEventListener(
                    "click",
                    function () {

                        newButton.classList.toggle(
                            "selected"
                        );


                        updateMedicalConditions();

                    }
                );


                updateMedicalConditions();

            }
        );

    }


    updateMedicalConditions();

}


/*
|--------------------------------------------------------------------------
| UPDATE MEDICAL CONDITIONS
|--------------------------------------------------------------------------
*/

function updateMedicalConditions() {


    var container =
        document.getElementById(
            "medicalConditionsTags"
        );


    var hiddenInput =
        document.getElementById(
            "medical_conditions"
        );


    if (
        !container ||
        !hiddenInput
    ) {

        return;

    }


    var selected =
        container.querySelectorAll(
            ".condition-tag.selected"
        );


    var conditions = [];


    selected.forEach(
        function (button) {

            if (
                button.id ===
                "addConditionButton"
            ) {

                return;

            }


            var condition =
                button.getAttribute(
                    "data-condition"
                );


            /*
            |--------------------------------------------------------------------------
            | If data-condition does not exist,
            | use button text.
            |--------------------------------------------------------------------------
            */

            if (
                !condition
            ) {

                condition =
                    button.textContent
                        .trim();

            }


            if (
                condition
            ) {

                conditions.push(
                    condition
                );

            }

        }
    );


    hiddenInput.value =
        conditions.join(
            ", "
        );

}


/*
|--------------------------------------------------------------------------
| MEDICAL DOCUMENT
|--------------------------------------------------------------------------
*/

function setupMedicalDocument() {


    var input =
        document.getElementById(
            "medical_document"
        );


    var nameDisplay =
        document.getElementById(
            "medical-document-name"
        );


    if (!input) {

        return;

    }


    input.addEventListener(
        "change",
        function () {


            if (
                !this.files ||
                !this.files.length
            ) {

                if (nameDisplay) {

                    nameDisplay.textContent =
                        "No document selected";

                }

                return;

            }


            var file =
                this.files[0];


            /*
            |--------------------------------------------------------------------------
            | Allowed extensions
            |--------------------------------------------------------------------------
            */

            var allowedExtensions = [

                "pdf",

                "jpg",

                "jpeg",

                "png"

            ];


            var extension =
                file.name
                    .split(".")
                    .pop()
                    .toLowerCase();


            if (
                allowedExtensions.indexOf(
                    extension
                ) === -1
            ) {

                alert(
                    "Only PDF, JPG, JPEG and PNG files are allowed."
                );


                this.value =
                    "";


                if (nameDisplay) {

                    nameDisplay.textContent =
                        "No document selected";

                }


                return;

            }


            /*
            |--------------------------------------------------------------------------
            | Maximum 10 MB
            |--------------------------------------------------------------------------
            */

            if (
                file.size >
                10 * 1024 * 1024
            ) {

                alert(
                    "Medical document must be smaller than 10 MB."
                );


                this.value =
                    "";


                if (nameDisplay) {

                    nameDisplay.textContent =
                        "No document selected";

                }


                return;

            }


            /*
            |--------------------------------------------------------------------------
            | Display filename
            |--------------------------------------------------------------------------
            */

            if (nameDisplay) {

                nameDisplay.textContent =
                    file.name +
                    " (" +
                    formatFileSize(
                        file.size
                    ) +
                    ")";

            }

        }
    );

}


/*
|--------------------------------------------------------------------------
| FORM SUBMISSION
|--------------------------------------------------------------------------
|
| IMPORTANT:
|
| We are NOT sending the form to PHP yet.
|
| We are temporarily storing the patient
| information in sessionStorage.
|
|--------------------------------------------------------------------------
*/

function setupFormSubmission() {
    var form = document.getElementById("patientForm");
    if (!form) return;

    form.addEventListener("submit", function (event) {
        event.preventDefault();

        if (!validateStep(3)) {
            return;
        }

        var loading = document.getElementById("loading-state");
        if (loading) {
            var steps = document.querySelectorAll('[id^="step-"][id$="-content"]');
            steps.forEach(function (section) {
                section.classList.add("hidden");
            });
            loading.classList.remove("hidden");
        }

        var createButton = document.getElementById("createPatientButton");
        if (createButton) {
            createButton.disabled = true;
            createButton.textContent = "Creating...";
        }

        HTMLFormElement.prototype.submit.call(form);
    });
}

/*
|--------------------------------------------------------------------------
| INITIALIZE
|--------------------------------------------------------------------------
*/

document.addEventListener(
    "DOMContentLoaded",
    function () {


        /*
        |--------------------------------------------------------------------------
        | Find steps
        |--------------------------------------------------------------------------
        */

        var step1 =
            document.getElementById(
                "step-1-content"
            );


        var step2 =
            document.getElementById(
                "step-2-content"
            );


        var step3 =
            document.getElementById(
                "step-3-content"
            );


        /*
        |--------------------------------------------------------------------------
        | Step 1 visible
        |--------------------------------------------------------------------------
        */

        if (step1) {

            step1.classList.remove(
                "hidden"
            );

        }


        /*
        |--------------------------------------------------------------------------
        | Step 2 hidden
        |--------------------------------------------------------------------------
        */

        if (step2) {

            step2.classList.add(
                "hidden"
            );

        }


        /*
        |--------------------------------------------------------------------------
        | Step 3 hidden
        |--------------------------------------------------------------------------
        */

        if (step3) {

            step3.classList.add(
                "hidden"
            );

        }


        /*
        |--------------------------------------------------------------------------
        | Reset current step
        |--------------------------------------------------------------------------
        */

        currentStep =
            1;


        /*
        |--------------------------------------------------------------------------
        | Update tracker
        |--------------------------------------------------------------------------
        */

        updateTracker(
            1
        );


        /*
        |--------------------------------------------------------------------------
        | Initialize medical conditions
        |--------------------------------------------------------------------------
        */

        setupMedicalConditions();


        /*
        |--------------------------------------------------------------------------
        | Initialize medical document
        |--------------------------------------------------------------------------
        */

        setupMedicalDocument();


        /*
        |--------------------------------------------------------------------------
        | Initialize form
        |--------------------------------------------------------------------------
        */

        setupFormSubmission();

    }
);