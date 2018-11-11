<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 07/10/18
 * Time: 21:30.
 */

namespace App\Service;

use App\Entity\Cart;
use App\Event\CartEvent;
use App\Model\CartProduct;
use App\Repository\CartProductRepository;
use App\Repository\CartRepository;
use Doctrine\ORM\ORMException;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class CartManager
{
    /**
     * @var CartRepository
     */
    private $cartRepository;
    /**
     * @var TokenStorageInterface
     */
    private $manager;
    /**
     * @var CartProductRepository
     */
    private $cartProductRepository;
    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * CartManager constructor.
     *
     * @param EventDispatcherInterface $eventDispatcher
     * @param CartRepository           $cartRepository
     * @param CartProductRepository    $cartProductRepository
     * @param TokenStorageInterface    $storage
     */
    public function __construct(
        EventDispatcherInterface $eventDispatcher,
        CartRepository $cartRepository,
        CartProductRepository $cartProductRepository,
        TokenStorageInterface $storage
    ) {
        $this->cartRepository = $cartRepository;
        $this->manager = $storage;
        $this->cartProductRepository = $cartProductRepository;
        $this->eventDispatcher = $eventDispatcher;

    }

    /**
     * @param CartProduct $cart
     */
    public function increaseQty(CartProduct $cart)
    {
        $cart = $this->cartProductRepository->getCart($cart->getId());
        $this->eventDispatcher->dispatch(CartEvent::CART_UPDATE, new CartEvent($cart));
    }

    /**
     * @param CartProduct $cart
     */
    public function decreaseQty(CartProduct $cart)
    {
        $cart = $this->cartProductRepository->getCart($cart->getId());
        $this->eventDispatcher->dispatch(CartEvent::CART_UPDATE, new CartEvent($cart));
    }

    /**
     * @param CartProduct $cartProduct
     */
    public function updateCart(CartProduct $cartProduct)
    {

    }


    /**
     * @return int|null
     */
    public function createNewCart()
    {
        $cart = new Cart();

        try {
            $this->cartRepository->create($cart);
            $this->cartRepository->setEmployee($this->manager->getToken()->getUser()->getId(), $cart->getId());
        } catch (ORMException $e) {
        }

        return $cart->getId();
    }

    /**
     * @param CartProduct $cartProduct
     */
    public function addProduct(CartProduct $cartProduct)
    {
        $this->cartProductRepository->update($cartProduct);
    }

    public function holdCart()
    {
    }

    public function checkPendingCartByEmployee()
    {
    }

    /**
     * @param int $idCart
     */
    public function createCartProduct(int $idCart)
    {
        $c = new CartProduct();
        $c->setId($idCart);
        $c->setQuantity(0);
        $this->cartProductRepository->create($c);
    }

    /**
     * @param CartProduct $cartProduct
     */
    private function customQty(CartProduct $cartProduct)
    {
        $this->cartProductRepository->updateProduct($cartProduct);
    }
}
