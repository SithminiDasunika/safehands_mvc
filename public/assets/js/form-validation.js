(() => {
    const phoneField = (field) => {
        const key = `${field.name || ''} ${field.id || ''}`.toLowerCase();
        return field.type === 'tel' || /phone|telephone|mobile/.test(key);
    };

    const birthdayField = (field) => {
        const key = `${field.name || ''} ${field.id || ''}`.toLowerCase();
        return /\bdob\b|birth.?date|date_of_birth/.test(key);
    };

    const localToday = () => {
        const now = new Date();
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const day = String(now.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    };

    const birthdayIsValid = (value) => {
        if (!/^\d{4}-\d{2}-\d{2}$/.test(value)) return false;
        const [year, month, day] = value.split('-').map(Number);
        const date = new Date(year, month - 1, day);
        return date.getFullYear() === year
            && date.getMonth() === month - 1
            && date.getDate() === day
            && value <= localToday();
    };

    const validateField = (field) => {
        if (phoneField(field)) {
            field.inputMode = 'numeric';
            field.maxLength = 10;
            field.pattern = '[0-9]{10}';
            field.title = 'Enter exactly 10 digits.';
            const value = field.value.trim();
            field.setCustomValidity(value !== '' && !/^[0-9]{10}$/.test(value)
                ? 'Enter a phone number using exactly 10 digits.'
                : '');
        } else if (birthdayField(field)) {
            field.max = localToday();
            const value = field.value.trim();
            field.setCustomValidity(value !== '' && !birthdayIsValid(value)
                ? 'Enter a real date of birth that is today or earlier.'
                : '');
        }
    };

    document.querySelectorAll('input').forEach((field) => {
        if (!phoneField(field) && !birthdayField(field)) return;
        validateField(field);
        field.addEventListener('input', () => validateField(field));
        field.addEventListener('change', () => validateField(field));
        field.addEventListener('blur', () => validateField(field));
    });

    document.querySelectorAll('form').forEach((form) => {
        form.addEventListener('submit', (event) => {
            const fields = Array.from(form.querySelectorAll('input'))
                .filter((field) => phoneField(field) || birthdayField(field));
            fields.forEach(validateField);
            const firstInvalid = fields.find((field) => !field.checkValidity());
            if (firstInvalid) {
                event.preventDefault();
                firstInvalid.reportValidity();
            }
        }, true);
    });
})();
