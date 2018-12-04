<?php

namespace App\Repository;

use App\Entity\OauthUsers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OauthUsers|null find($id, $lockMode = null, $lockVersion = null)
 * @method OauthUsers|null findOneBy(array $criteria, array $orderBy = null)
 * @method OauthUsers[]    findAll()
 * @method OauthUsers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OauthUsersRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OauthUsers::class);
    }

//    /**
//     * @return OauthUser[] Returns an array of OauthUser objects
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
    public function findOneBySomeField($value): ?OauthUser
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
