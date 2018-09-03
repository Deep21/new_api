<?php

namespace App\Repository;

use App\Entity\ManufacturerShop;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ManufacturerShop|null find($id, $lockMode = null, $lockVersion = null)
 * @method ManufacturerShop|null findOneBy(array $criteria, array $orderBy = null)
 * @method ManufacturerShop[]    findAll()
 * @method ManufacturerShop[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ManufacturerShopRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ManufacturerShop::class);
    }

    //    /**
    //     * @return ManufacturerShop[] Returns an array of ManufacturerShop objects
    //     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ManufacturerShop
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
