<?php

class NotificationsController extends Controller
{
    public function index(): void
    {
        $notificationsModel = $this->model('Notifications');

        $data = [
            'title' => 'Notifications | SafeHands',
            'unreadCount' => $notificationsModel->getUnreadCount(),
            'notifications' => $notificationsModel->getNotifications()
        ];

        $this->view(
            'notifications/index',
            $data,
            'notifications'
        );
    }
}