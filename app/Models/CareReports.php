<?php

class CareReports extends Model
{
    public function getSummary(): array
    {
        return [
            'patient' => 'Mr. Silva',

            'patient_image' =>
                'https://lh3.googleusercontent.com/aida-public/AB6AXuCaYmvlAgbG6rgbkme-pm5zMEnQP24VPAec0t9mqGj2FflJgMJjtDTujRsAVHok_wsHsBQoFRyLhWd2jRr4qzRDcPcMUGiLldnUQqiwygTl_aAmfm8Hd9QdUIMzl_DXpc3uXSU2iPBrWHcRBg7OVnYMGpYYJLDyqvYwxQ8WrH_6LLWS3Lf-HdeIVfGcXWzrw1Z7Jinegz0BUq0uxW5iDXXYi3H1nNndeLpzzpKFUDz0yLY3xvnjUt94FrJRHJ2UNSMlVSQxZ21GLa8',

            'caregiver' => 'Nadeesha Perera',

            'booking_id' => 'BK-2026-00125',

            'status' => 'In Progress'
        ];
    }


    public function getReports(): array
    {
        return [

            [
                'date' => '18 July 2026',
                'shift' => 'Morning Shift',
                'status' => 'Stable',
                'status_type' => 'stable',

                'caregiver' => 'Nadeesha Perera',

                'image' =>
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuCuOh1_Yt07yBwqmREeSrvEtFbGTraTB6eTBVkFIPuqkrTpoBr0PUA8GF6rIXtSeaxA1RuOMCEh-PewGoobf8BfXIw9G-ezNuBXP1IjqZRItaYee4uHvIJjYD8I7CIyhTSCpzdwAoSRNzDrkQ_aXOfMRLk4PDOr2ZRmKMfMd2zDndiiZLup3oZshqDK6uXDnj1PoXAlG5M8TPutJA_CeuiWRE_owkJMM06BZsVrmSO2pv-Ep927415pXf0J9WuFufTSwfVnP6U3I7o',

                'description' =>
                    'Medication administered successfully and patient remained comfortable throughout the session. Vital signs are normal and breakfast was well-received.'
            ],

            [
                'date' => '17 July 2026',
                'shift' => 'Afternoon Shift',
                'status' => 'Needs Attention',
                'status_type' => 'attention',

                'caregiver' => 'James Wilson',

                'image' =>
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuCWAEi0rRzvXeZOi0JAABItBRZsGHSkJM2twPMuiPTYT97770Fww6zTzZz-cKKTrNVcdRUMmMMpYQpyCagiNFTZe_jdtk5HmQu9cymIXpFEwYYZ_RvG9tbNULA0A7QUKCZXcJgKxaLAFdsakHF4FggL82MsVgg5mv_tykZk010GRgGBbDmTfRHBRax-x64A9ywNZKvyOLex_zJDSbM902nes5KbJB4Iwhuba7FykGAeE59cHv53OQWqkMBjVDDgrZS3q72mU78ICSE',

                'description' =>
                    'Patient reported mild discomfort in the lower back area. Assisted with physiotherapy exercises. Noted a slight decrease in appetite during lunch.'
            ],

            [
                'date' => '17 July 2026',
                'shift' => 'Evening Shift',
                'status' => 'Follow-up Required',
                'status_type' => 'followup',

                'caregiver' => 'Sarah Mitchell',

                'image' =>
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuAs6_N9H2WGmXdTv-Puy7riC_ip_lx0e5ga-fNip-C25wme8QTCcY5Po-V2z3w_1H1MTyRGPEwPHdY64H5C2SYADPuhvyaDRWaP60ufS38VxIHroljVnB749Jf1AyiEGBpr-DvW5TiO7D1cZjFvcXP1QKPxSf_mlz8Gcaj-VRjVO2bF0fXYS2N3o5S-OcV7U9Uni43GXWHqhGnPVXIi8woR-VnBzwYXENjQtMbluXWQSDdh8SLyov4vtXDUUZXkGaOAzh_e28CW6CU',

                'description' =>
                    'Routine check-up completed. Recommended a follow-up with the primary physician regarding sleep pattern adjustments discussed during the session.'
            ],

            [
                'date' => '16 July 2026',
                'shift' => 'Morning Shift',
                'status' => 'Stable',
                'status_type' => 'stable',

                'caregiver' => 'Nadeesha Perera',

                'image' =>
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuBzAiYaR2D6rRaGGSH-RczR_IIB072opiLv4FaaJ9R1-6TeKz05tLFP7bi2AWl0ppbwxqqdW77NxMzneFxlnApx3okGEpHlN9k-tUeeXQNrW9wp99KR9E3r-LN8LtdBMNv7F4cXAgX-xeUDgT4APFuhRoO9Im-tjq0ak4v3orr-ySnvlFOfgo34QcSPlpTu-J_JnFQ8AVbh6Dxi5zoLR9PD-CDZXnH16h-SWun4La599yEMwCujo2f3QGENsqDpRNJsI_s2k_8nwXU',

                'description' =>
                    'Excellent session. Patient was highly active and engaged in morning walk. Blood pressure readings are within target range.'
            ],

            [
                'date' => '16 July 2026',
                'shift' => 'Afternoon Shift',
                'status' => 'Stable',
                'status_type' => 'stable',

                'caregiver' => 'Ryan Cooper',

                'image' =>
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuB-NMDxR5JWHE71aSWg5_FjRLlizbM3kChcxQgnBR3sWgTYP8DNEQy1CPHtvK5t3n5VAlLnCfv9rUEDSXyUPPOBwQQwmnaekFxCykhgsSfgpaiv_vWJzhd1h0-3Tq6frOFs1SBN_3nE3wyVug-zjBkUGQ1Eac6mlOme887nck7FlNZ3_4LUhrEEdgkaJdjouBVCJDOZ3O0HJz_Ecs6vNLlDOxuiVP3Ea8lEuefYEpUCeHtQkgmi7JsL8JV4VIY0SoN4RqlVYMa35QY',

                'description' =>
                    'Assisted with lunch and light housekeeping. Patient spent time reading in the garden and mood was very positive throughout the afternoon.'
            ],

            [
                'date' => '15 July 2026',
                'shift' => 'Evening Shift',
                'status' => 'Stable',
                'status_type' => 'stable',

                'caregiver' => 'Sarah Mitchell',

                'image' =>
                    'https://lh3.googleusercontent.com/aida-public/AB6AXuDBw34Bl7nr9YAjrC2GuS60i70gCy7rf3_SfuGnOnO3b1cCNMxpPnIhXk0s8wZGyrj3Pqm9rCtggQFJ3VoaElzkZ15oCrrneuzWW8Hawy-rDczMIelozv6Lql8ql36devUWXqWrA5mwDQwaGpr7qgbKC_i9-GsI26U1BmXqlGCthlvPpy2eYoZDWTtfoMIVW7aTOrBAy_g_5i8OktZwla-VSroAS1JLloXDkU-MrtlmlXSu12-BkfwUEzPZabZ1A4Y4x-0z889NRvg',

                'description' =>
                    'Evening medication administered at 8:00 PM. Patient was settled and resting comfortably before shift end. All safety protocols followed.'
            ]

        ];
    }
}