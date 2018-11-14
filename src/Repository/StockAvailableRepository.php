<?php

namespace App\Repository;

use App\Entity\StockAvailable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method StockAvailable|null find($id, $lockMode = null, $lockVersion = null)
 * @method StockAvailable|null findOneBy(array $criteria, array $orderBy = null)
 * @method StockAvailable[]    findAll()
 * @method StockAvailable[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StockAvailableRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, StockAvailable::class);
    }

//    /**
//     * @return StockAvailable[] Returns an array of StockAvailable objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?StockAvailable
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
