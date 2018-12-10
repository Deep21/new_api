<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 10/12/18
 * Time: 16:30
 */

namespace App\Entity\Bridge;

use Doctrine\ORM\Mapping as ORM;

/**
 * AccessTokenEntity.
 *
 * @ORM\Table(name="oauth_refresh_token")
 *
 * @ORM\Entity(repositoryClass="App\Repository\Doctrine\RefreshAccessTokenRepository")
 */
class RefreshTokenEntity
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\Column(type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="refresh_token_id", type="string", length=255, nullable=false)
     */
    private $accessToken;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_revoked", type="boolean", nullable=false)
     */
    private $isRevoked;

    /**
     * @var \DateTimeInterface
     * @ORM\Column(name="expire_at", type="datetime", nullable=false)
     */
    private $expiresAt;

    /**
     * @var \DateTimeInterface
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
    private $updatedAt;

    /**
     * @var \DateTimeInterface
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * RefreshToken constructor.
     * @param string $accessTokenId
     * @param \DateTimeInterface $expiresAt
     */
    public function __construct(string $accessTokenId, \DateTimeInterface $expiresAt)
    {
        $this->accessToken = $accessTokenId;
        $this->expiresAt = $expiresAt;
        $this->setCreatedAt(new \DateTime());
        $this->setUpdatedAt(new \DateTime());
        $this->isRevoked = 0;
    }

    /**
     * @return string
     */
    public function getAccessTokenId(): string
    {
        return $this->accessToken;
    }

    /**
     * @return bool
     */
    public function isRevoked(): bool
    {
        return $this->isRevoked;
    }

    public function revoke(): void
    {
        $this->isRevoked = true;
    }

    /**
     * @return \DateTime
     */
    public function getExpiresAt(): \DateTime
    {
        return $this->getExpiresAt();
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}