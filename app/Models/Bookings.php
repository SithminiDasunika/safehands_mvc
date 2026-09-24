<?php

class Bookings extends Model
{
    public function getStats(): array
    {
        return [
            'upcoming' => 2,
            'active' => 1,
            'completed' => 5,
            'cancelled' => 1
        ];
    }


    public function getActiveBooking(): array
    {
        return [
            'caregiver' => 'Nadeesha Perera',

            'patient' => 'Ananda Silva',

            'status' => 'Care In Progress',

            'started' => '08:00 AM Today',

            'location' => 'Colombo 07',

            'progress' => 50,

            'progress_text' => '4 Hours / 8 Hours',

            'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDvMG_Xj5ECxX7rW6j-y_weYMDvd-4Ud24RBBKLchKYT2um2M6yXS4yGK1PmBwjaTjD4r_KrOyW82GumpiuSKLF_RpYRIKSgql0S9TPbKMzQVCFCVilmS0yFBiijo9R6FFyYAjJaieFboVkEd-np7cAcaSW6v8taS2FwYqBIjmnRd36v6P-LMRf5TBu05sCOA-ZYlmvHrZNl_L4ZPrZHeHSgJBdbSdQiJWcX9gUpLvP7VU90fCwBpil'
        ];
    }


    public function getUpcomingBookings(): array
    {
        return [
            [
                'caregiver' => 'Nadeesha Perera',

                'patient' => 'Ananda Silva',

                'status' => 'Confirmed',

                'date' => 'Aug 18, 2026',

                'time' => '08:00 AM - 04:00 PM',

                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuC-jFBR0_4ezcaXH_GVdlFJWD9WB0HICd8AqWNqSk9infGfA7pjVbfaI40kEmbKlkvHFgl-OawmD65yE38KkibykvFP8ELs0yCgr85njS5kkPdcfr7-yeiZzqJgJVd9vOWJweDpL3K9Eiwonjgg1HaSvg2kJgKrW78OTZDQPThpEulsqd2YmAKsSAm9uBFa3cQ2WWh6zTwVTIJkhlA4eYPV1gbzQumg6oUF9I7yjoGQTCGMK4b2gERv'
            ],

            [
                'caregiver' => 'Sarah Wijesinghe',

                'patient' => 'Kamala Silva',

                'status' => 'Confirmed',

                'date' => 'Aug 20, 2026',

                'time' => '04:00 PM - 08:00 PM',

                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuC0nJLV9WF9TyMh8N6n3piDgu7-WZvOlhuvqWTVAKp7lwUzNGwk7sitGxo9knPwekk3L1BN_PXu7-sUJroPFYCV8072Mgnhp8fH9iySCpNkpjkW0A1TOO5mMNvDv-DPRn9Xgo0aHmrjvUWyX63OKA0F0uiaY6AO_VOEq5fZ7b9FpK8poADmKNikVfcUlyqFD6B7ePmsZvYzNMgonXkZjiyddEffCRh_p3WiKLBKdvEBsRnurHNJZzyh'
            ]
        ];
    }


    public function getCompletedBookings(): array
    {
        return [
            [
                'caregiver' => 'Nadeesha Perera',

                'date' => 'Aug 15',

                'status' => 'Completed',

                'reviewed' => false,

                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAaIVeE9-fcVS-T9NBmOXOO6ZzKDsA9QgMvSp347lEskJPztCloRfCmFyFhuHbJOuUpFevB82UJWSs43HRFR584xMq9hBvBY5aPNjoQifqojRtaVRA0gOFCcKRaEvKmCW_LHDUaJXgWTm0rqO27zo9gi2F2HySnvUbIaYl2mdxsLyYoycao3vANGjzWjgwkGnkVFJPLXhlTWjU1wau9lkVPda7nKVccfFmFuFOlLNlDZlFs20QZXzK5'
            ],

            [
                'caregiver' => 'Kamal Perera',

                'date' => 'Aug 10',

                'status' => 'Reviewed',

                'reviewed' => true,

                'rating' => 5.0,

                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuByKV0tCEOyEE76xn6f_tNIVwW3nqLpuuNWt_-LuzKk7vNBf6WmASNt9RBcrDxea9Tu3ic3y0gLQQ9Lgaq2PitKdefPj7jLnD01sU_pQXXhexZHGQrkzw1RpdhGdAWeaZbMwifz_PuSNAV4CG9KQVjIif1F3UlvDTxf80z0lxCdmQzjBygOXzvXOnzUyi0yiEqqr3sAnWsdP4zm62_s5gzazhyNIZPjHfyL8u1_cZrEakPZvRpZ0drP'
            ]
        ];
    }
}