<div class="care-form-page">

    <div class="page-header">
        <div>
            <h1>Create Care Report</h1>
            <p>Submit a daily care report for a patient.</p>
        </div>

        <a href="/safehands_mvc/care-reports" class="btn-secondary">
            ← Back
        </a>
    </div>

    <form action="/safehands_mvc/care-reports/store"
          method="POST"
          class="care-form">

        <div class="form-group">
            <label for="caregiver_id">Caregiver ID</label>
            <input
                type="number"
                id="caregiver_id"
                name="caregiver_id"
                required
            >
        </div>

        <div class="form-group">
            <label for="patient_name">Patient Name</label>
            <input
                type="text"
                id="patient_name"
                name="patient_name"
                required
            >
        </div>

        <div class="form-group">
            <label for="booking_id">Booking ID</label>
            <input
                type="text"
                id="booking_id"
                name="booking_id"
            >
        </div>

        <div class="form-group">
            <label for="report_date">Report Date</label>
            <input
                type="date"
                id="report_date"
                name="report_date"
                required
            >
        </div>

        <div class="form-group">
            <label for="shift">Shift</label>
            <select id="shift" name="shift" required>
                <option value="">Select Shift</option>
                <option value="Morning">Morning</option>
                <option value="Afternoon">Afternoon</option>
                <option value="Night">Night</option>
            </select>
        </div>

        <div class="form-group">
            <label for="condition_status">Condition Status</label>
            <select
                id="condition_status"
                name="condition_status"
                required
            >
                <option value="">Select Status</option>
                <option value="Stable">Stable</option>
                <option value="Needs Attention">Needs Attention</option>
                <option value="Follow-up">Follow-up</option>
            </select>
        </div>

        <div class="form-group">
            <label for="activities">Activities</label>
            <textarea
                id="activities"
                name="activities"
                rows="4"
            ></textarea>
        </div>

        <div class="form-group">
            <label for="medication">Medication</label>
            <textarea
                id="medication"
                name="medication"
                rows="4"
            ></textarea>
        </div>

        <div class="form-group">
            <label for="meal">Meal</label>
            <textarea
                id="meal"
                name="meal"
                rows="3"
            ></textarea>
        </div>

        <div class="form-group">
            <label for="vitals">Vitals</label>
            <textarea
                id="vitals"
                name="vitals"
                rows="3"
                placeholder="Example: BP 120/80, Temperature 36.5°C"
            ></textarea>
        </div>

        <div class="form-group">
            <label for="notes">Notes</label>
            <textarea
                id="notes"
                name="notes"
                rows="5"
            ></textarea>
        </div>

        <div class="form-actions">
            <a
                href="/safehands_mvc/care-reports"
                class="btn-secondary"
            >
                Cancel
            </a>

            <button type="submit" class="btn-primary">
                Submit Care Report
            </button>
        </div>

    </form>

</div>