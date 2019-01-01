<?php
/**
 * @author      Alex Bilbie <hello@alexbilbie.com>
 * @copyright   Copyright (c) Alex Bilbie
 * @license     http://mit-license.org/
 *
 * @link        https://github.com/thephpleague/oauth2-server
 */

namespace App\Repository\Oauth;

use App\Entity\Bridge\Scope;
use App\Entity\Oauth\ScopeEntity;
use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Repositories\ScopeRepositoryInterface;

class ScopeRepository implements ScopeRepositoryInterface
{
    /**
     * @var \App\Repository\Doctrine\ScopeRepository
     */
    private $scopeRepository;

    /**
     * ScopeRepository constructor.
     * @param \App\Repository\Doctrine\ScopeRepository $scopeRepository
     */
    public function __construct(\App\Repository\Doctrine\ScopeRepository $scopeRepository)
    {
        $this->scopeRepository = $scopeRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function getScopeEntityByIdentifier($scopeIdentifier)
    {
        $scope = $this->scopeRepository->getScopeByScopeIdentifier($scopeIdentifier);

        if($scope == null){
            return null;
        }
        $scope = new ScopeEntity();
        $scope->setIdentifier($scopeIdentifier);

        return $scope;
    }

    /**
     * {@inheritdoc}
     */
    public function finalizeScopes(
        array $scopes,
        $grantType,
        ClientEntityInterface $clientEntity,
        $userIdentifier = null
    ) {
        /*        // Example of programatically modifying the final scope of the access token
                if ((int) $userIdentifier === 1) {
                    $scope = new ScopeEntity();
                    $scope->setIdentifier('email');
                    $scopes[] = $scope;
                }*/

        return $scopes;
    }
}
