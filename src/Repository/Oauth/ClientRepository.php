<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 02/12/18
 * Time: 11:07
 */

namespace App\Repository\Oauth;

use App\Entity\Oauth\ClientEntity;
use App\Repository\Doctrine\OAuthClientRepository;
use Doctrine\ORM\EntityManagerInterface;
use League\OAuth2\Server\Repositories\ClientRepositoryInterface;

class ClientRepository implements ClientRepositoryInterface
{
    /**
     * @var OAuthClientRepository
     */
    private $authClientRepository;


    /**
     * ClientRepository constructor.
     * @param OAuthClientRepository $authClientRepository
     */
    public function __construct(OAuthClientRepository $authClientRepository)
    {
        $this->authClientRepository = $authClientRepository;
    }

    /**
     * {@inheritdoc}
     */
    public function getClientEntity($clientIdentifier, $grantType = null, $clientSecret = null, $mustValidateSecret = true)
    {
        $client = $this->authClientRepository->getClients($clientIdentifier, $clientSecret);
        // Check if client is registered
        if ($client === null) {
            return null;
        }
/*        if (
            $mustValidateSecret === true
            && $clients[$clientIdentifier]['is_confidential'] === true
            && password_verify($clientSecret, $clients[$clientIdentifier]['secret']) === false
        ) {
            return;
        }*/

        $client = new ClientEntity();
        $client->setIdentifier($clientIdentifier);
        $client->setName($client->getName());
        $client->setRedirectUri($client->getRedirectUri());

        return $client;
    }
}
