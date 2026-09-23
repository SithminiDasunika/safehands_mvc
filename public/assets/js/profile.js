document.addEventListener('DOMContentLoaded', function () {

    const toast = document.getElementById('profileToast');

    const uploadButton =
        document.querySelector('[data-action="upload-document"]');

    const uploadInput =
        document.getElementById('documentUpload');


    function showToast(message) {

        if (!toast) {
            return;
        }

        toast.textContent = message;

        toast.classList.add('show');


        clearTimeout(window.profileToastTimer);


        window.profileToastTimer =
            setTimeout(function () {

                toast.classList.remove('show');

            }, 2500);
    }



    /*
     * Edit Profile
     */
    document
        .querySelectorAll('[data-action="edit-profile"]')
        .forEach(function (button) {

            button.addEventListener('click', function () {

                showToast(
                    'Edit Patient Profile will be connected later.'
                );

            });

        });



    /*
     * Medical History
     */
    document
        .querySelector('[data-action="medical-history"]')
        ?.addEventListener('click', function () {

            showToast(
                'Medical History will be connected later.'
            );

        });



    /*
     * View All History
     */
    document
        .querySelector('[data-action="view-history"]')
        ?.addEventListener('click', function () {

            showToast(
                'Full care history will be connected later.'
            );

        });



    /*
     * View Report
     */
    document
        .querySelectorAll('.report-button')
        .forEach(function (button) {

            button.addEventListener('click', function () {

                showToast(
                    'Care report viewing will be connected later.'
                );

            });

        });



    /*
     * View Documents
     */
    document
        .querySelectorAll('.document-view')
        .forEach(function (button) {

            button.addEventListener('click', function () {

                showToast(
                    'Document preview will be connected later.'
                );

            });

        });



    /*
     * Download Documents
     */
    document
        .querySelectorAll('.document-download')
        .forEach(function (button) {

            button.addEventListener('click', function () {

                showToast(
                    'Document download will be connected later.'
                );

            });

        });



    /*
     * Book Caregiver
     */
    document
        .querySelector('[data-action="book-caregiver"]')
        ?.addEventListener('click', function () {

            showToast(
                'Caregiver booking will be connected later.'
            );

        });



    /*
     * Delete Patient
     */
    document
        .querySelector('[data-action="delete-patient"]')
        ?.addEventListener('click', function () {

            showToast(
                'Delete action will be connected after backend implementation.'
            );

        });



    /*
     * Upload Document
     */
    if (uploadButton && uploadInput) {

        uploadButton.addEventListener('click', function () {

            uploadInput.click();

        });


        uploadInput.addEventListener('change', function () {

            if (!uploadInput.files.length) {
                return;
            }


            const file =
                uploadInput.files[0];


            showToast(
                file.name + ' selected.'
            );

        });

    }

});