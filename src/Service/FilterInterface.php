<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 09/11/18
 * Time: 15:53
 */

namespace App\Service;


use App\Model\CartProduct;
use Doctrine\ORM\EntityRepository;

interface FilterInterface
{
    public function apply(CartProduct $cart) : void;

    /**
     * @param EntityRepository $entityRepository
     * @return FilterInterface
     */
    public function injectRepository(EntityRepository $entityRepository) : self;

}