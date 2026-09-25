/* =========================================================
   Caregiver Availability Management
   SafeHands
   ========================================================= */

document.addEventListener("DOMContentLoaded", function () {

    const dataElement = document.getElementById("availability-data");

    let availabilityData = [];

    if (dataElement) {
        try {
            availabilityData = JSON.parse(dataElement.textContent);
        } catch (error) {
            console.error("Unable to load availability data.", error);
        }
    }

    let currentDate = new Date();

    const monthNames = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December"
    ];

    const currentMonthElement =
        document.getElementById("currentMonth");

    const calendarDays =
        document.getElementById("calendarDays");

    const previousMonthButton =
        document.getElementById("previousMonth");

    const nextMonthButton =
        document.getElementById("nextMonth");

    const todayButton =
        document.getElementById("todayButton");

    const availabilityForm =
        document.getElementById("availabilityForm");

    const dateInput =
        document.getElementById("availabilityDate");

    const shiftInput =
        document.getElementById("availabilityShift");

    const statusInput =
        document.getElementById("availabilityStatus");

    const recordsBody =
        document.getElementById("recordsBody");

    const availableCount =
        document.getElementById("availableCount");

    const bookedCount =
        document.getElementById("bookedCount");

    const offDutyCount =
        document.getElementById("offDutyCount");


    /* =========================
       Calendar
       ========================= */

    function renderCalendar() {

        if (!calendarDays) {
            return;
        }

        calendarDays.innerHTML = "";

        const year = currentDate.getFullYear();
        const month = currentDate.getMonth();

        if (currentMonthElement) {
            currentMonthElement.textContent =
                monthNames[month] + " " + year;
        }

        const firstDay =
            new Date(year, month, 1).getDay();

        const daysInMonth =
            new Date(year, month + 1, 0).getDate();

        const previousMonthDays =
            new Date(year, month, 0).getDate();

        /*
         * Sunday = 0
         * Monday = 1
         */

        for (let i = firstDay - 1; i >= 0; i--) {

            const emptyDay =
                document.createElement("div");

            emptyDay.className =
                "calendar-day empty";

            emptyDay.innerHTML =
                `<div class="day-number">
                    ${previousMonthDays - i}
                </div>`;

            calendarDays.appendChild(emptyDay);
        }

        for (let day = 1; day <= daysInMonth; day++) {

            const dayElement =
                document.createElement("div");

            dayElement.className =
                "calendar-day";

            const dateString =
                formatDate(year, month + 1, day);

            if (isToday(year, month, day)) {
                dayElement.classList.add("today");
            }

            let html = `
                <div class="day-number">
                    ${day}
                </div>
            `;

            const dayAvailability =
                availabilityData.filter(function (item) {
                    return item.date === dateString;
                });

            dayAvailability.forEach(function (item) {

                const statusClass =
                    item.status
                        .toLowerCase()
                        .replace(/\s+/g, "-");

                html += `
                    <div class="availability-entry ${statusClass}">
                        ${escapeHtml(item.shift)}
                        <br>
                        ${escapeHtml(item.status)}
                    </div>
                `;
            });

            dayElement.innerHTML = html;

            calendarDays.appendChild(dayElement);
        }
    }


    /* =========================
       Format Date
       ========================= */

    function formatDate(year, month, day) {

        const monthValue =
            String(month).padStart(2, "0");

        const dayValue =
            String(day).padStart(2, "0");

        return `${year}-${monthValue}-${dayValue}`;
    }


    /* =========================
       Check Today
       ========================= */

    function isToday(year, month, day) {

        const today = new Date();

        return (
            today.getFullYear() === year &&
            today.getMonth() === month &&
            today.getDate() === day
        );
    }


    /* =========================
       Previous Month
       ========================= */

    if (previousMonthButton) {

        previousMonthButton.addEventListener(
            "click",
            function () {

                currentDate.setMonth(
                    currentDate.getMonth() - 1
                );

                renderCalendar();
            }
        );
    }


    /* =========================
       Next Month
       ========================= */

    if (nextMonthButton) {

        nextMonthButton.addEventListener(
            "click",
            function () {

                currentDate.setMonth(
                    currentDate.getMonth() + 1
                );

                renderCalendar();
            }
        );
    }


    /* =========================
       Today
       ========================= */

    if (todayButton) {

        todayButton.addEventListener(
            "click",
            function () {

                currentDate = new Date();

                renderCalendar();
            }
        );
    }


    /* =========================
       Add Availability
       ========================= */

    if (availabilityForm) {

        availabilityForm.addEventListener(
            "submit",
            function (event) {

                event.preventDefault();

                const date =
                    dateInput.value;

                const shift =
                    shiftInput.value;

                const status =
                    statusInput.value;

                if (!date || !shift || !status) {
                    alert("Please complete all fields.");
                    return;
                }

                const duplicate =
                    availabilityData.some(function (item) {

                        return (
                            item.date === date &&
                            item.shift === shift
                        );
                    });

                if (duplicate) {

                    alert(
                        "This shift already exists for the selected date."
                    );

                    return;
                }

                availabilityData.push({
                    id: Date.now(),
                    date: date,
                    shift: shift,
                    status: status
                });

                availabilityForm.reset();

                renderCalendar();
                renderRecords();
                updateSummary();

                alert("Availability added successfully.");
            }
        );
    }


    /* =========================
       Render Records
       ========================= */

    function renderRecords() {

        if (!recordsBody) {
            return;
        }

        recordsBody.innerHTML = "";

        const sortedData =
            [...availabilityData].sort(function (a, b) {

                return (
                    new Date(a.date) -
                    new Date(b.date)
                );
            });

        sortedData.forEach(function (item) {

            const row =
                document.createElement("tr");

            const statusClass =
                item.status
                    .toLowerCase()
                    .replace(/\s+/g, "-");

            const booked =
                item.status === "Booked";

            row.innerHTML = `
                <td>${escapeHtml(item.date)}</td>

                <td>${escapeHtml(item.shift)}</td>

                <td>
                    <span class="status-badge ${statusClass}">
                        ${escapeHtml(item.status)}
                    </span>
                </td>

                <td>
                    <button
                        class="action-btn edit-btn"
                        data-id="${item.id}"
                        ${booked ? "disabled" : ""}
                    >
                        Edit
                    </button>

                    <button
                        class="action-btn delete-btn"
                        data-id="${item.id}"
                        ${booked ? "disabled" : ""}
                    >
                        Delete
                    </button>
                </td>
            `;

            recordsBody.appendChild(row);
        });

        attachActionEvents();
    }


    /* =========================
       Edit / Delete
       ========================= */

    function attachActionEvents() {

        const editButtons =
            document.querySelectorAll(".edit-btn");

        const deleteButtons =
            document.querySelectorAll(".delete-btn");


        editButtons.forEach(function (button) {

            button.addEventListener(
                "click",
                function () {

                    const id =
                        Number(button.dataset.id);

                    editAvailability(id);
                }
            );
        });


        deleteButtons.forEach(function (button) {

            button.addEventListener(
                "click",
                function () {

                    const id =
                        Number(button.dataset.id);

                    deleteAvailability(id);
                }
            );
        });
    }


    /* =========================
       Edit Availability
       ========================= */

    function editAvailability(id) {

        const item =
            availabilityData.find(function (entry) {

                return entry.id === id;
            });

        if (!item) {
            return;
        }

        if (item.status === "Booked") {

            alert(
                "Booked availability cannot be modified."
            );

            return;
        }

        const newDate =
            prompt(
                "Enter new date (YYYY-MM-DD):",
                item.date
            );

        if (!newDate) {
            return;
        }

        const newShift =
            prompt(
                "Enter shift (Morning, Afternoon, Evening):",
                item.shift
            );

        if (!newShift) {
            return;
        }

        const newStatus =
            prompt(
                "Enter status (Available, Booked, Off Duty):",
                item.status
            );

        if (!newStatus) {
            return;
        }

        item.date = newDate;
        item.shift = newShift;
        item.status = newStatus;

        renderCalendar();
        renderRecords();
        updateSummary();

        alert("Availability updated successfully.");
    }


    /* =========================
       Delete Availability
       ========================= */

    function deleteAvailability(id) {

        const item =
            availabilityData.find(function (entry) {

                return entry.id === id;
            });

        if (!item) {
            return;
        }

        if (item.status === "Booked") {

            alert(
                "Booked availability cannot be deleted."
            );

            return;
        }

        const confirmed =
            confirm(
                "Are you sure you want to delete this availability?"
            );

        if (!confirmed) {
            return;
        }

        availabilityData =
            availabilityData.filter(function (entry) {

                return entry.id !== id;
            });

        renderCalendar();
        renderRecords();
        updateSummary();
    }


    /* =========================
       Summary
       ========================= */

    function updateSummary() {

        const available =
            availabilityData.filter(function (item) {

                return item.status === "Available";
            }).length;

        const booked =
            availabilityData.filter(function (item) {

                return item.status === "Booked";
            }).length;

        const offDuty =
            availabilityData.filter(function (item) {

                return item.status === "Off Duty";
            }).length;


        if (availableCount) {
            availableCount.textContent = available;
        }

        if (bookedCount) {
            bookedCount.textContent = booked;
        }

        if (offDutyCount) {
            offDutyCount.textContent = offDuty;
        }
    }


    /* =========================
       HTML Escape
       ========================= */

    function escapeHtml(value) {

        const div =
            document.createElement("div");

        div.textContent =
            value ?? "";

        return div.innerHTML;
    }


    /* =========================
       Initial Render
       ========================= */

    renderCalendar();
    renderRecords();
    updateSummary();

});