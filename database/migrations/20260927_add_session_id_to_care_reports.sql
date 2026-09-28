-- Attach each newly submitted care report to exactly one booked care session.
-- Existing reports remain valid with session_id = NULL and can still be viewed
-- through the legacy booking-level report route.
ALTER TABLE booking_sessions
    MODIFY COLUMN status ENUM('scheduled', 'otp_verified', 'in_progress', 'completed') NOT NULL DEFAULT 'scheduled';

ALTER TABLE care_reports
    ADD COLUMN session_id INT NULL AFTER booking_id,
    ADD UNIQUE KEY uq_care_reports_session_id (session_id),
    ADD CONSTRAINT fk_care_reports_booking_session
        FOREIGN KEY (session_id)
        REFERENCES booking_sessions (session_id)
        ON DELETE SET NULL
        ON UPDATE CASCADE;
