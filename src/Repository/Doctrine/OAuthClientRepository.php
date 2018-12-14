<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 07/12/18
 * Time: 14:14
 */

namespace App\Repository\Doctrine;

use App\Entity\Bridge\OAuthClient;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OAuthClient|null find($id, $lockMode = null, $lockVersion = null)
 * @method OAuthClient|null findOneBy(array $criteria, array $orderBy = null)
 * @method OAuthClient[]    findAll()
 * @method OAuthClient[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OAuthClientRepository extends ServiceEntityRepository
{

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OAuthClient::class);
    }

    /**
     * @param string $clients
     * @param string $secret
     * @return OAuthClient|null
     */
    public function getClients(string $clients, string $secret)
    {
        return $this->findOneBy(['id' => $clients, 'clientSecret' =>$secret]);
    }
}
