<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 07/12/18
 * Time: 14:14
 */

namespace App\Repository\Doctrine;

use App\Entity\Bridge\AccessTokenEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use League\OAuth2\Server\Entities\AccessTokenEntityInterface;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AccessTokenEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method AccessTokenEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method AccessTokenEntity[]    findAll()
 * @method AccessTokenEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AccessTokenRepository extends ServiceEntityRepository
{
    const REVOKED  = 1;
    const UNREVOKE = 0;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AccessTokenEntity::class);
    }

    /**
     * @param string $tokenId
     * @return mixed
     */
    public function isTokenExist(string $tokenId)
    {
        $token =  $this->findOneBy(['accessToken' => $tokenId, 'isRevoked' => self::REVOKED ]);

        if ($token == null) {
            return false;
        }

        return true;
    }

    /**
     * @param string $tokenId
     */
    public function revokeAccessToken(string $tokenId)
    {
        $this
            ->createQueryBuilder('a')
            ->update()
            ->set('a.isRevoked', ':isRevoked')
            ->where('a.accessToken = :tokenId')
            ->setParameters(
                [
                    'tokenId'   => $tokenId,
                    'isRevoked' => self::REVOKED,
                ]
            )
            ->getQuery()
            ->execute();
    }

    /**
     * @param AccessTokenEntityInterface $accessTokenEntity
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function saveToken(AccessTokenEntityInterface $accessTokenEntity)
    {
        $accessToken = new AccessTokenEntity();

        $uid = $accessTokenEntity->getUserIdentifier();
        $accessTokenID = $accessTokenEntity->getIdentifier();
        $expireAt = $accessTokenEntity->getExpiryDateTime();
        $scopes = $accessTokenEntity->getScopes();
        $accessToken->setScope(json_encode($this->scopesToArray($scopes)));
        $client = $accessTokenEntity->getClient();
        $accessToken->setExpireAt($expireAt);
        $accessToken->setAccessToken($accessTokenID);

        $this->_em->persist($accessToken);
        $this->_em->flush();
    }


    private function scopesToArray(array $scopes): array
    {
        return array_map(function ($scope) {
            return $scope->getIdentifier();
        }, $scopes);
    }
}
