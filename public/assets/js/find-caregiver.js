document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('searchForm');
    const grid = document.getElementById('resultsGrid');
    const emptyState = document.getElementById('emptyState');
    const count = document.getElementById('resultCount');
    const sortSelect = document.getElementById('sortSelect');
    const cards = Array.from(document.querySelectorAll('.caregiver-card'));
    const experienceCheckboxes = Array.from(document.querySelectorAll('.experience-filter'));
    const genderButtons = Array.from(document.querySelectorAll('.gender-button'));
    const languageButtons = Array.from(document.querySelectorAll('.language-tags [data-language]'));
    const verifiedOnly = document.getElementById('verifiedOnly');

    const normalize = (value) => (value || '').toString().trim().toLowerCase();
    const experienceYears = (card) => {
        const years = Number.parseFloat(card.dataset.experience || '0');
        return Number.isFinite(years) ? years : 0;
    };

    function matchesQualification(card, value) {
        const details = normalize(card.dataset.qualification);
        switch (value) {
            case 'cna': return details.includes('cna') || details.includes('certified nursing assistant');
            case 'lpn': return details.includes('lpn') || details.includes('licensed practical nurse');
            case 'rn': return details.includes('rn') || details.includes('registered nurse');
            case 'first_aid': return details.includes('first aid');
            default: return true;
        }
    }

    function matchesExperienceRange(years, range) {
        if (!range) return true;
        if (range === '1-3') return years >= 1 && years < 3;
        if (range === '3-5') return years >= 3 && years < 5;
        if (range === '5-10') return years >= 5 && years < 10;
        if (range === '10+') return years >= 10;
        return true;
    }

    function matchesExperienceLevel(years, level) {
        if (level === 'Senior') return years >= 10;
        if (level === 'Advanced') return years >= 5 && years < 10;
        if (level === 'Experienced') return years >= 2 && years < 5;
        return true;
    }

    function sortCards() {
        const sortBy = sortSelect?.value || 'match';
        const sorted = [...cards].sort((a, b) => {
            if (sortBy === 'rating') return Number(b.dataset.rating || 0) - Number(a.dataset.rating || 0);
            if (sortBy === 'experience') return experienceYears(b) - experienceYears(a);
            return Number(a.dataset.order || 0) - Number(b.dataset.order || 0);
        });
        sorted.forEach((card) => grid.appendChild(card));
    }

    function applyFilters() {
        const name = normalize(document.getElementById('name')?.value);
        const district = normalize(document.getElementById('district')?.value).replace(/\s+district$/, '');
        const qualification = document.getElementById('qualification')?.value || '';
        const selectedLanguage = normalize(document.getElementById('language')?.value);
        const experienceRange = document.getElementById('experience')?.value || '';
        const selectedGender = normalize(genderButtons.find((button) => button.classList.contains('selected'))?.dataset.gender);
        const selectedLanguages = languageButtons
            .filter((button) => button.classList.contains('selected'))
            .map((button) => normalize(button.dataset.language));
        if (selectedLanguage) selectedLanguages.push(selectedLanguage);
        const selectedLevels = experienceCheckboxes
            .filter((checkbox) => checkbox.checked)
            .map((checkbox) => checkbox.value);

        sortCards();
        let visibleCount = 0;

        cards.forEach((card) => {
            const years = experienceYears(card);
            const cardDistrict = normalize(card.dataset.district).replace(/\s+district$/, '');
            const cardLanguages = normalize(card.dataset.languages).split(',').map((language) => language.trim());
            const matches = (!name || normalize(card.dataset.name).includes(name))
                && (!district || cardDistrict === district || cardDistrict.includes(district))
                && matchesQualification(card, qualification)
                && (!selectedLanguages.length || selectedLanguages.some((language) => cardLanguages.some((candidate) => candidate === language || candidate.includes(language))))
                && matchesExperienceRange(years, experienceRange)
                && (!selectedLevels.length || selectedLevels.some((level) => matchesExperienceLevel(years, level)))
                && (!selectedGender || normalize(card.dataset.gender) === selectedGender)
                && (!verifiedOnly?.checked || card.dataset.verified === 'true');

            card.hidden = !matches;
            card.style.display = matches ? '' : 'none';
            if (matches) visibleCount += 1;
        });

        if (count) count.textContent = String(visibleCount);
        if (grid) {
            grid.hidden = visibleCount === 0;
            grid.style.display = visibleCount === 0 ? 'none' : '';
        }
        emptyState?.classList.toggle('show', visibleCount === 0);
    }

    function resetAll() {
        form?.reset();
        if (verifiedOnly) verifiedOnly.checked = false;
        experienceCheckboxes.forEach((checkbox) => { checkbox.checked = false; });
        genderButtons.forEach((button) => {
            button.classList.remove('selected');
            button.setAttribute('aria-pressed', 'false');
        });
        languageButtons.forEach((button) => {
            button.classList.remove('selected');
            button.setAttribute('aria-pressed', 'false');
        });
        if (sortSelect) sortSelect.value = 'match';
        applyFilters();
    }

    form?.addEventListener('submit', (event) => {
        event.preventDefault();
        applyFilters();
    });
    form?.addEventListener('input', applyFilters);
    form?.addEventListener('change', applyFilters);
    form?.addEventListener('reset', () => window.setTimeout(applyFilters, 0));

    document.getElementById('clearButton')?.addEventListener('click', (event) => {
        event.preventDefault();
        resetAll();
    });
    document.getElementById('resetFilters')?.addEventListener('click', resetAll);
    sortSelect?.addEventListener('change', applyFilters);
    verifiedOnly?.addEventListener('change', applyFilters);
    experienceCheckboxes.forEach((checkbox) => checkbox.addEventListener('change', applyFilters));

    genderButtons.forEach((button) => {
        button.addEventListener('click', () => {
            const wasSelected = button.classList.contains('selected');
            genderButtons.forEach((item) => {
                item.classList.remove('selected');
                item.setAttribute('aria-pressed', 'false');
            });
            if (!wasSelected) {
                button.classList.add('selected');
                button.setAttribute('aria-pressed', 'true');
            }
            applyFilters();
        });
    });

    languageButtons.forEach((button) => {
        button.addEventListener('click', () => {
            button.classList.toggle('selected');
            button.setAttribute('aria-pressed', button.classList.contains('selected') ? 'true' : 'false');
            applyFilters();
        });
    });

    applyFilters();
});
