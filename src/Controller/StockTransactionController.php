<?php

namespace App\Controller;

use App\Message\PurchaseConfirmationNotification;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Messenger\MessageBusInterface;

class StockTransactionController extends AbstractController
{
    #[Route('/buy', name: 'buy-stock')]
    public function buy(MessageBusInterface $bus): Response
    {
        $order = new class
        {
            public function getid(): int
            {
                return 1;
            }

            public function getBuyer(): object
            {
                return new class
                {
                    public function getEmail()
                    {
                        return 'test@email.com.br';
                    }
                };
            }
        };

        $bus->dispatch(new PurchaseConfirmationNotification($order));

        return $this->render('stocks/example.html.twig');
    }
}
