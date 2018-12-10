<?php
/**
 * @author      Alex Bilbie <hello@alexbilbie.com>
 * @copyright   Copyright (c) Alex Bilbie
 * @license     http://mit-license.org/
 *
 * @link        https://github.com/thephpleague/oauth2-server
 */

namespace App\Repository\Oauth;

use App\Entity\Oauth\AccessTokenEntity;
use Doctrine\ORM\EntityManagerInterface;
use League\OAuth2\Server\Entities\AccessTokenEntityInterface;
use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Repositories\AccessTokenRepositoryInterface;

class AccessTokenRepository implements AccessTokenRepositoryInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;
    /**
     * @var \App\Repository\Doctrine\AccessTokenRepository
     */
    private $repository;

    /**
     * AccessTokenRepository constructor.
     * @param EntityManagerInterface $entityManager
     * @param \App\Repository\Doctrine\AccessTokenRepository $repository
     */
    public function __construct(EntityManagerInterface $entityManager, \App\Repository\Doctrine\AccessTokenRepository $repository)
    {
        $this->entityManager = $entityManager;
        $this->repository = $repository;
    }

    /**
     * {@inheritdoc}
     */
    public function persistNewAccessToken(AccessTokenEntityInterface $accessTokenEntity)
    {
        $em = $this->entityManager;
        $accessToken = new AccessTokenEntity();
        $uid = $accessTokenEntity->getUserIdentifier();
        $accessTokenID = $accessTokenEntity->getIdentifier();
        $expireAt = $accessTokenEntity->getExpiryDateTime();
        $scopes = $accessTokenEntity->getScopes();
        $accessToken->setScope(json_encode($this->scopesToArray($scopes)));
        $client = $accessTokenEntity->getClient();
        $accessToken->setExpireAt($expireAt);
        $accessToken->setAccessToken($accessTokenID);

        $em->persist($accessToken);
        $em->flush();
    }

    private function scopesToArray(array $scopes): array
    {
        return array_map(function ($scope) {
            return $scope->getIdentifier();
        }, $scopes);
    }

    /**
     * {@inheritdoc}
     */
    public function revokeAccessToken($tokenId) : void
    {
        // Some logic here to revoke the access token
        $this->repository->revokeAccessToken($tokenId);
    }

    /**
     * {@inheritdoc}
     */
    public function isAccessTokenRevoked($tokenId) : bool
    {
        return $this->repository->isTokenExist($tokenId);
    }

    /**
     * {@inheritdoc}
     */
    public function getNewToken(ClientEntityInterface $clientEntity, array $scopes, $userIdentifier = null)
    {
        $accessToken = new AccessTokenEntity();
        $accessToken->setClient($clientEntity);
//        dump($scopes);
        foreach ($scopes as $scope) {
            //$accessToken->addScope($scope);
        }
        $accessToken->setUserIdentifier($userIdentifier);

        return $accessToken;
    }
}
