<?php

namespace App\Repository\Doctrine;

use App\Entity\Bridge\Scope;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\ORMException;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Scope|null find($id, $lockMode = null, $lockVersion = null)
 * @method Scope|null findOneBy(array $criteria, array $orderBy = null)
 * @method Scope[]    findAll()
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
        return $this->findOneBy(['scope'=>'ROLE_USER']);
    }

    public function setScpoe(Scope $scope)
    {
        try {
            $this->_em->persist($scope);
            $this->_em->flush();

        } catch (ORMException $e) {
        }
    }

}
