<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 02/12/18
 * Time: 11:39
 */

namespace App\Entity\Oauth;


use League\OAuth2\Server\Entities\ClientEntityInterface;
use League\OAuth2\Server\Entities\Traits\EntityTrait;
use League\OAuth2\Server\Entities\Traits\ScopeTrait;

class ClientEntity implements ClientEntityInterface
{
    use EntityTrait, ScopeTrait;
    /**
     * Get the client's identifier.
     *
     * @return string
     */
    public function getIdentifier()
    {
        // TODO: Implement getIdentifier() method.
    }

    /**
     * Get the client's name.
     *
     * @return string
     */
    public function getName()
    {
        // TODO: Implement getName() method.
    }

    /**
     * Returns the registered redirect URI (as a string).
     *
     * Alternatively return an indexed array of redirect URIs.
     *
     * @return string|string[]
     */
    public function getRedirectUri()
    {
        // TODO: Implement getRedirectUri() method.
    }

    public function setIdentifier($clientIdentifier)
    {
    }

    public function setName($name)
    {
    }

    public function setRedirectUri($redirect_uri)
    {
    }
}