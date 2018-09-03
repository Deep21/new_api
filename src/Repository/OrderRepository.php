<?php

namespace App\Repository;

use App\Entity\Order;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class OrderRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Order::class);
    }

    /**
     * @param int $id
     *
     * @return array|Order
     */
    public function getOrdersByClient(int $id): ? array
    {
        $o = $this->createQueryBuilder('o')
            ->select(['o'])
            ->where('o.customer = ?1')
            ->setParameter('1', $id)
            ->getQuery()
            ->getArrayResult();

        return $o;
    }

    /**
     * @param int $id
     *
     * @return Order
     */
    public function findOrderBy(int $id)
    {
        try {
            return $this->createQueryBuilder('o')
                ->select(['o'])
                ->where('o.id = :id')
                ->setParameter(':id', $id)
                ->getQuery()
                ->getSingleResult();
        } catch (NoResultException $e) {
            throw new NotFoundHttpException('Not Found');
        } catch (NonUniqueResultException $e) {
        }

        return null;
    }

    /**
     * @return Order
     *
     * @throws \Doctrine\ORM\ORMException
     */
    public function createOrder()
    {
        $order = new Order();
        $order->setReference('refere');
        $order->setCurrentState(1);
        $em = $this->getEntityManager();
        $em->persist($order);
        $em->flush();

        return $order;
    }

    /**
     * @param \App\Model\Order $order
     */
    public function updateOrder(\App\Model\Order $order)
    {
        $qb = $this->createQueryBuilder('o')->update();

        if (null != $order->getCustomer()) {
            $qb
                ->set('o.customer', ':customerId')
                ->setParameter('customerId', $order->getCustomer()->getId());
        }
        $qb
            ->set('o.cart', ':cartId')
            ->where('o.id = :orderId')
            ->setParameters(
                [
                    'orderId' => $orderId,
                    'cartId' => $cart->getId(),
                ]
            )
            ->getQuery()
            ->execute();
    }
}
