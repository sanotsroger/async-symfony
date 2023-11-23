<?php

namespace App\MessageHandler;

use App\Message\PurchaseConfirmationNotification;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Mime\Email;

#[AsMessageHandler]
class PurchaseConfimationNotificationHandler
{
    public function __construct(private MailerInterface $mailer)
    {
    }

    public function __invoke(PurchaseConfirmationNotification $notification)
    {
        // Create PDF
        echo 'Create PDF ...<br/>';

        // Email
        $email = (new Email())
            ->from('sales@test.com')
            ->to($notification->getOrder()->getBuyer()->getEmail())
            ->subject('Contract note for order ' . $notification->getOrder()->getid())
            ->text('A message');

        $this->mailer->send($email);
    }
}
