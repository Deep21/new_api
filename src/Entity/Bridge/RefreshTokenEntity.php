<?php
/**
 * Created by PhpStorm.
 * User: deeptha
 * Date: 10/12/18
 * Time: 16:30
 */

namespace App\Entity\Bridge;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\JoinColumn;

/**
 * RefreshTokenEntity.
 *
 * @ORM\Table(name="oauth_refresh_token")
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
     * @ORM\Column(name="refresh_token", type="string", length=80, nullable=false, unique=true)
     */
    private $refresh_token;

    /**
     * @ORM\ManyToOne(targetEntity=OAuthClient::class, cascade={"persist", "remove"})
     * @JoinColumn(name="client_id", referencedColumnName="id")
     */
    private $client;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_revoked", type="boolean", nullable=false)
     */
    private $isRevoked;

    /**
     * @var \DateTimeInterface
     *
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
     *
     * @param string $accessTokenId
     * @param \DateTimeInterface $expiresAt
     */
    public function __construct(string $accessTokenId, \DateTimeInterface $expiresAt)
    {
        $this->refresh_token = $accessTokenId;
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
        return $this->refresh_token;
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

    public function getRefreshToken(): ?string
    {
        return $this->refresh_token;
    }

    public function setRefreshToken(string $refresh_token): self
    {
        $this->refresh_token = $refresh_token;

        return $this;
    }

    public function getIsRevoked(): ?bool
    {
        return $this->isRevoked;
    }

    public function setIsRevoked(bool $isRevoked): self
    {
        $this->isRevoked = $isRevoked;

        return $this;
    }

    public function setExpiresAt(\DateTimeInterface $expiresAt): self
    {
        $this->expiresAt = $expiresAt;

        return $this;
    }

    public function getClient(): ?OAuthClient
    {
        return $this->client;
    }

    public function setClient(?OAuthClient $client): self
    {
        $this->client = $client;

        return $this;
    }
}
