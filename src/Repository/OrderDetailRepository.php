<?php

namespace App\Repository;

use App\Entity\OrderDetail;
use App\Entity\Order;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OrderDetail|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderDetail|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderDetail[]    findAll()
 * @method OrderDetail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderDetailRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OrderDetail::class);
    }

    public function createOrderDetail(Order $order)
    {
    }

    /**
     * @param array $cartProducts
     * @param Order $order
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function insertOrderDetail(array $cartProducts = [], Order $order)
    {
        $em = $this->getEntityManager();

        /** @var \App\Model\CartProduct $cartProduct */
        foreach ($cartProducts as $cartProduct) {
            $orderDetail = new OrderDetail();
            $orderDetail->setProductName($cartProduct->getProductName());
            $orderDetail->setProductQuantity($cartProduct->getQuantity());
            $orderDetail->setOrder($order);
            $em->persist($orderDetail);
        }
            $em->flush();

    }


}
