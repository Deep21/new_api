<?php

namespace App\Repository;

use App\Entity\OrderInvoice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OrderInvoice|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderInvoice|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderInvoice[]    findAll()
 * @method OrderInvoice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderInvoiceRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OrderInvoice::class);
    }

}
