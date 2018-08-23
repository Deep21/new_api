<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 19/08/18
 * Time: 20:04
 */

namespace App\Repository;
use App\Entity\Address;
use App\Entity\Customer;
use App\Entity\Manufacturer;
use App\Entity\Tax;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;


/**
     * @method Tax|null find($id, $lockMode = null, $lockVersion = null)
     * @method Tax|null findOneBy(array $criteria, array $orderBy = null)
     * @method Tax[]    findAll()
     * @method Tax[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
     */
class TaxRepository extends ServiceEntityRepository
{

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Tax::class);
    }


//    /**
//     * @return Order[] Returns an array of Order objects
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
    public function findOneBySomeField($value): ?Order
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