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
            $em->persist($orderDetail);

            $this->createQueryBuilder('o')
                ->update('o')
                ->set('o.order', ':orderId')
                ->where('o.id = :id')
                ->setParameter('orderId', $order->getId())
                ->setParameter('id', $orderDetail->getId());
        }
            $em->flush();

    }


    //    /**
    //     * @return OrderDetail[] Returns an array of OrderDetail objects
    //     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OrderDetail
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
