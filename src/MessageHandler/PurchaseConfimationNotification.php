<?php

namespace App\MessageHandler;

use App\Message\PurchaseConfimationNotification;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler()]
class PurchaseConfimationNotificationHandler
{
    public function __invoke(PurchaseConfimationNotification $notification)
    {
        // Create PDF
        echo 'Create PDF ...<br/>';

        // Email
        echo 'Create Email notification ' . $notification->getOrder()->getBuyer()->getEmail() . '<br/>';
    }
}
