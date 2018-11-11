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

class UpFilter implements FilterInterface
{
    /**
     * @var EntityRepository $entityRepository
     */
    private $entityRepository;

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