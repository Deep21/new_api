<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 09/11/18
 * Time: 15:53
 */

namespace App\Service;


use App\Event\CartEvent;
use App\Model\CartProduct;
use App\Repository\CartProductRepository;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class UpFilter implements FilterInterface
{
    /**
     * @var CartProductRepository $entityRepository
     */
    private $entityRepository;
    /**
     * @var EventDispatcher $dispatcher
     */
    private $dispatcher;

    /**
     * UpFilter constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param EntityRepository $entityRepository
     * @return FilterInterface
     */
    public function injectRepository(EntityRepository $entityRepository) : FilterInterface
    {
        $this->entityRepository = $entityRepository;
        return $this;
    }

    /**
     * @param EventDispatcherInterface $dispatcher
     * @return FilterInterface
     */
    public function setEventDispatcher(EventDispatcherInterface $dispatcher) : FilterInterface
    {
        $this->dispatcher = $dispatcher;
        return $this;
    }

    /**
     * @param CartProduct $cartProduct
     */
    public function apply(CartProduct $cartProduct) : void
    {
        $this->dispatcher->dispatch(CartEvent::CART_INCREASE, new CartEvent());
//        $cartProduct = $this->entityRepository->getQuantity($cartProduct);
//        $this->entityRepository->upQty($cartProduct);
    }

}