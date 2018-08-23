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
use App\Entity\Employee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;


/**
     * @method Employee|null find($id, $lockMode = null, $lockVersion = null)
     * @method Employee|null findOneBy(array $criteria, array $orderBy = null)
     * @method Employee[]    findAll()
     * @method Employee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
     */
class EmployeeRepository extends ServiceEntityRepository
{

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Employee::class);
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