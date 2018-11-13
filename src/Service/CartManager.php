<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 07/10/18
 * Time: 21:30.
 */

namespace App\Service;

use App\Entity\Cart;
use App\Entity\Employee;
use App\Entity\User;
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
     * @return Cart
     */
    public function createNewCart()
    {
        $cart = new Cart();
        try {

            $userToken = $this->manager->getToken()->getUser();
            $employee = new Employee();
            $employee->setId(2);
            $cart->setEmployee($employee);
            $this->cartRepository->create($cart);

        } catch (ORMException $e) {
        }

        return $cart;
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
     * @param Cart $cart
     * @param CartProduct $cartProduct
     */
    public function createCartProduct(Cart $cart, CartProduct $cartProduct)
    {
        $this->cartProductRepository->create($cart, $cartProduct);
    }

    /**
     * @param CartProduct $cartProduct
     */
    private function customQty(CartProduct $cartProduct)
    {
        $this->cartProductRepository->updateProduct($cartProduct);
    }
}
