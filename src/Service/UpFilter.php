<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 09/11/18
 * Time: 15:53
 */

namespace App\Service;


class UpFilter implements FilterInterface
{
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
     *
     */
    public function apply() : void
    {
        dd(__CLASS__);
    }
}