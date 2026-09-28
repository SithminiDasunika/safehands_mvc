<?php

class NotificationsController extends Controller
{
    public function index(): void
    {
        // Presentation-only examples. The notification backend can replace
        // this array when persistent notifications are implemented.
        $notifications = [
            'Today' => [
                [
                    'type' => 'emergency',
                    'icon' => '!',
                    'title' => 'Emergency Alert',
                    'time' => '10:42 AM',
                    'message' => 'An emergency alert was triggered for Ananda Silva.',
                    'link_text' => 'View Emergency',
                    'link' => '/safehands_mvc/family',
                    'unread' => true
                ],
                [
                    'type' => 'report',
                    'icon' => '▤',
                    'title' => 'Daily Care Report Available',
                    'time' => '08:15 AM',
                    'message' => 'A new care report for Ananda Silva is available.',
                    'link_text' => 'View Bookings',
                    'link' => '/safehands_mvc/bookings',
                    'unread' => true
                ],
                [
                    'type' => 'review',
                    'icon' => '★',
                    'title' => 'How was your care experience?',
                    'time' => '07:00 AM',
                    'message' => 'Your care session with Nadeesha Perera has been completed. Please rate your caregiver.',
                    'link_text' => 'View Bookings',
                    'link' => '/safehands_mvc/bookings',
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
                    'link_text' => 'View Bookings',
                    'link' => '/safehands_mvc/bookings',
                    'unread' => false
                ],
                [
                    'type' => 'payment',
                    'icon' => '₨',
                    'title' => 'Payment Successful',
                    'time' => '02:15 PM',
                    'message' => 'Your payment for booking #SH-882910 has been successfully received.',
                    'link_text' => 'View Payment History',
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
                    'link_text' => 'View Bookings',
                    'link' => '/safehands_mvc/bookings',
                    'unread' => false
                ]
            ]
        ];
        $unreadCount = 0;
        foreach ($notifications as $group) {
            foreach ($group as $notification) {
                if ($notification['unread']) {
                    $unreadCount++;
                }
            }
        }

        $data = [
            'title' => 'Notifications | SafeHands',
            'unreadCount' => $unreadCount,
            'notifications' => $notifications
        ];

        $this->view(
            'notifications/index',
            $data,
            'notifications'
        );
    }
}
