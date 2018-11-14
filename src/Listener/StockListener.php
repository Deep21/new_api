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
use App\Service\StockManager;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class StockListener implements EventSubscriberInterface
{
    /**
     * @var StockManager
     */
    private $manager;

    /**
     * CartListener constructor.
     * @param StockManager $manager
     */
    public function __construct(StockManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * Returns an array of events this subscriber wants to listen to.
     *
     * @return string[]
     */
    public static function getSubscribedEvents(): array
    {
        return [CartEvent::CART_INCREASE => [['onCartIncrease', 2]]];
    }

    /**
     * @param CartEvent $event
     */
    public function onCartIncrease(CartEvent $event): void
    {
        try {
            $this->manager->decreaseQtyFromStock();
        } catch (\Exception $e) {
            dd($e);
        }

    }




}
