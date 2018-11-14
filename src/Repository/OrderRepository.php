<?php

namespace App\Repository;

use App\Entity\Cart;
use App\Entity\Customer;
use App\Entity\Order;
use App\Utils\OrderUtil;
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
     * @param \App\Model\Order $model
     * @return Order
     *
     * @throws \Doctrine\ORM\ORMException

     */
    public function createOrder(\App\Model\Order $model)
    {
        $em   = $this->getEntityManager();
        $cart = $em->getReference(Cart::class, $model->getCart()->getId());
        $order = new Order();
        $order->setReference(OrderUtil::generateReference());
        $order->setCurrentState(1);
        $order->setCart($cart);

        if($model->getCustomer() !=null) {
            $customer = $em->getReference(Customer::class, $model->getCustomer()->getId());
            $order->setCustomer($customer);
        }

        $em = $this->getEntityManager();
        $em->persist($order);
        $em->flush();

        return $order;
    }

    /**
     * @param \App\Model\Order $order
     * @param Order $orderEntity
     */
    public function updateOrder(\App\Model\Order $order, Order $orderEntity)
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
            ->setParameter('orderId', 1)
            ->setParameter('cartId', $order->getCart()->getId())
            ->getQuery()
            ->execute();
    }
}
