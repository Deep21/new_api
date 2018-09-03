<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 09/11/18
 * Time: 15:53
 */

namespace App\Service;


interface FilterInterface
{
    public function apply() : void;

    public function injectManager(CartManager $cartManager) : FilterInterface;

}