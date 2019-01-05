<?php

namespace App\Repository\Doctrine;

use App\Entity\Bridge\Scope;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\ORMException;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Scope|null find($id, $lockMode = null, $lockVersion = null)
 * @method Scope|null findOneBy(array $criteria, array $orderBy = null)
 * @method Scope[]    findAll()doctrine findOnby array field - Recherche Google
 * @method Scope[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScopeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Scope::class);
    }

    /**
     * @param string $scopeIdentifier
     * @return Scope|null
     */
    public function getScopeByScopeIdentifier(string $scopeIdentifier) : ?Scope
    {
       return $this->findOneBy(['scope'=>"ROLES_USER,ROLES_USER"]);
    }

    public function setScpoe(Scope $scope)
    {
        try {
            $this->_em->persist($scope);
            $this->_em->flush();

        } catch (ORMException $e) {
        }
    }

    /**
     * @param array $scope
     *
     * @return mixed
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    private function getScopes(array $scope = [])
    {
        return $this->_em->createQueryBuilder('s')
            ->where('s.scope = :scope')
            ->setParameter('scope', serialize($scope))
            ->getQuery()
            ->getSingleResult();
    }

}
