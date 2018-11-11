<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 25/10/18
 * Time: 22:38.
 */

namespace App\Listener;

use App\Event\CartEvent;
use App\Repository\CartProductRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class CartListener implements EventSubscriberInterface
{
    /**
     * @var CartProductRepository
     */
    private $cartProductRepository;

    /**
     * CartListener constructor.
     *
     * @param CartProductRepository $cartProductRepository
     */
    public function __construct(CartProductRepository $cartProductRepository)
    {
        $this->cartProductRepository = $cartProductRepository;
    }

    public function checkStock(CartEvent $event)
    {
        dump(__LINE__);
    }

    /**
     * Returns an array of events this subscriber wants to listen to.
     *
     * @return string[]
     */
    public static function getSubscribedEvents(): array
    {
        return [
            CartEvent::CART_UPDATE => [
                ['checkStock'],
                ['onCartUpdate']
            ]
        ];
    }

    /**
     * @param CartEvent $event
     */
    public function onCartDecrease(CartEvent $event): void
    {
        if (1 === $event->getCart()->getQuantity()) {
            $this->cartProductRepository->deleteCart($event->getCart()->getId());

            return;
        }

        $this->cartProductRepository->downQty($event->getCart());
    }

    public function onCartIncrease()
    {

    }

    public function onCartUpdate(CartEvent $event)
    {
        dump(__LINE__);

    }


}
