<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 09/11/18
 * Time: 15:53
 */

namespace App\Service;


use App\Model\CartProduct;

class UpFilter implements FilterInterface
{
    /**
     * @var CartManager $cartManager
     */
    private $cartManager;

    /**
     * UpFilter constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param  CartManager $cartManager
     * @return $this|FilterInterface
     */
    public function injectManager(CartManager $cartManager) : FilterInterface
    {
        $this->cartManager = $cartManager;
        return $this;
    }

    /**
     * @param CartProduct $cartProduct
     */
    public function apply(CartProduct $cartProduct) : void
    {
        $this->cartManager->decreaseQty($cartProduct);
    }

    public function setModel()
    {
        // TODO: Implement setModel() method.
    }
}