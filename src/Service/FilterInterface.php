<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 09/11/18
 * Time: 15:53
 */

namespace App\Service;


use App\Model\CartProduct;

interface FilterInterface
{
    public function apply(CartProduct $cart) : void;

    public function injectManager(CartManager $cartManager) : FilterInterface;

}