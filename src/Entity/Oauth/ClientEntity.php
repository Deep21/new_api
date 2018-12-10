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

    private $name;

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


    public function setName($name)
    {
        $this->name = $name;
    }

    public function setRedirectUri($redirect_uri)
    {
    }

    /**
     * Get the client's name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
