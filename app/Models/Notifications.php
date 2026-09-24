<?php

class Notifications extends Model
{
    public function getUnreadCount(): int
    {
        return 3;
    }

    public function getNotifications(): array
    {
        return [
            'Today' => [
                [
                    'type' => 'emergency',
                    'icon' => '!',
                    'title' => 'Emergency Alert',
                    'time' => '10:42 AM',
                    'message' => 'An emergency alert was triggered for Ananda Silva.',
                    'link_text' => 'View Emergency',
                    'link' => '#',
                    'unread' => true
                ],

                [
                    'type' => 'report',
                    'icon' => '▤',
                    'title' => 'Daily Care Report Available',
                    'time' => '08:15 AM',
                    'message' => 'A new care report for Ananda Silva is available.',
                    'link_text' => 'View Report',
                    'link' => '/safehands_mvc/care-report',
                    'unread' => true
                ],

                [
                    'type' => 'review',
                    'icon' => '★',
                    'title' => 'How was your care experience?',
                    'time' => '07:00 AM',
                    'message' => 'Your care session with Nadeesha Perera has been completed. Please rate your caregiver.',
                    'link_text' => 'Rate Caregiver',
                    'link' => '/safehands_mvc/review',
                    'unread' => true
                ]
            ],

            'Yesterday' => [
                [
                    'type' => 'booking',
                    'icon' => '✓',
                    'title' => 'Booking Approved',
                    'time' => '04:30 PM',
                    'message' => 'Your booking with Nadeesha Perera for Ananda Silva has been approved.',
                    'link_text' => 'View Booking',
                    'link' => '/safehands_mvc/booking/details',
                    'unread' => false
                ],

                [
                    'type' => 'payment',
                    'icon' => '₨',
                    'title' => 'Payment Successful',
                    'time' => '02:15 PM',
                    'message' => 'Your payment for booking #SH-882910 has been successfully received.',
                    'link_text' => 'View Payment',
                    'link' => '/safehands_mvc/payment-history',
                    'unread' => false
                ]
            ],

            'Earlier' => [
                [
                    'type' => 'complaint',
                    'icon' => 'S',
                    'title' => 'Complaint Updated',
                    'time' => 'Oct 12',
                    'message' => 'Our support team has updated the status of your complaint regarding booking #SH-882910.',
                    'link_text' => 'View Complaint',
                    'link' => '/safehands_mvc/complaint',
                    'unread' => false
                ]
            ]
        ];
    }
}