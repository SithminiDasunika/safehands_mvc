import re

# 1. Update dashboard-si.php navigation
with open('app/Views/caregivers/dashboard-si.php', 'r') as f:
    content = f.read()

nav_pattern = r'(<a href="/safehands_mvc/caregiver/dashboard".*?උපකරණ පුවරුව\s*</a>)'
new_links = """
            <a href="/safehands_mvc/bookings/indexSi"
               class="nav-link">
                වෙන්කරවා ගැනීමේ ඉල්ලීම්
            </a>

            <a href="/safehands_mvc/caregiver/pendingReportsSi"
               class="nav-link">
                පොරොත්තු වාර්තා
            </a>
"""

if 'වෙන්කරවා ගැනීමේ ඉල්ලීම්' not in content:
    content = re.sub(nav_pattern, r'\1\n' + new_links, content)
    with open('app/Views/caregivers/dashboard-si.php', 'w') as f:
        f.write(content)

# 2. Add BookingsController->indexSi
with open('app/Controllers/BookingsController.php', 'r') as f:
    bc = f.read()

if 'public function indexSi' not in bc:
    # copy index method logic
    pattern = r'public function index\(\): void\s*\{.*?(?=public function|\Z)'
    match = re.search(pattern, bc, flags=re.DOTALL)
    if match:
        index_logic = match.group(0)
        index_si_logic = index_logic.replace('public function index', 'public function indexSi')
        index_si_logic = index_si_logic.replace("'bookings/caregiver-index'", "'bookings/caregiver-index-si'")
        index_si_logic = index_si_logic.replace("'My Bookings | SafeHands'", "'මගේ වෙන්කිරීම් | SafeHands'")
        index_si_logic = index_si_logic.replace("'Booking Requests | SafeHands'", "'වෙන්කරවා ගැනීමේ ඉල්ලීම් | SafeHands'")
        
        bc = bc.replace(index_logic, index_logic + "\n" + index_si_logic)
        
        with open('app/Controllers/BookingsController.php', 'w') as f:
            f.write(bc)

# 3. Create caregiver-index-si.php
import shutil
shutil.copy('app/Views/bookings/caregiver-index.php', 'app/Views/bookings/caregiver-index-si.php')

with open('app/Views/bookings/caregiver-index-si.php', 'r') as f:
    si_view = f.read()

translations = {
    'My Bookings': 'මගේ වෙන්කිරීම්',
    'Dashboard': 'උපකරණ පුවරුව',
    'Search bookings...': 'වෙන්කිරීම් සොයන්න...',
    'Active Booking': 'සක්‍රිය වෙන්කිරීම',
    'Starts at': 'ආරම්භ වන්නේ',
    'Location': 'ස්ථානය',
    'View Booking': 'වෙන්කිරීම බලන්න',
    'Contact': 'සම්බන්ධ වන්න',
    'Cancel': 'අවලංගු කරන්න',
    'Upcoming Requests': 'ඉදිරි ඉල්ලීම්',
    'Completed Care': 'අවසන් කළ සත්කාර',
    'Patient:': 'රෝගියා:',
    'No bookings found.': 'කිසිදු වෙන්කිරීමක් හමු නොවීය.'
}

for eng, sin in translations.items():
    si_view = si_view.replace(eng, sin)

with open('app/Views/bookings/caregiver-index-si.php', 'w') as f:
    f.write(si_view)

