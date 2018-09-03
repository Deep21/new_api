<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 04/11/18
 * Time: 01:57.
 */

namespace App\Service;

use App\Entity\Order;
use App\Repository\OrderRepository;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\ORMException;

abstract class AbstractOrderManager
{
    /**
     * @var OrderRepository
     */
    private $repo;

    /**
     * CustomerManager constructor.
     *
     * @param EntityRepository $repo
     */
    public function __construct(EntityRepository $repo)
    {
        $this->repo = $repo;
    }

    /**
     * @param \App\Model\Order $order
     *
     * @return mixed
     */
    abstract public function onCreateNewOrder(\App\Model\Order $order);

    /**
     * @param \App\Model\Order $order
     *
     * @return mixed
     */
    abstract public function onUpdateOrder(\App\Model\Order $order);

    /**
     * @param \App\Model\Order $orderClient
     */
    public function createNewOrder(\App\Model\Order $orderClient)
    {
        try {

            $id = $this->repo->createOrder()->getId();
            $orderClient->setId($id);

            $this->onUpdateOrder($orderClient);
            $this->onCreateNewOrder($orderClient);
        } catch (ORMException $e) {
        }
    }
}
