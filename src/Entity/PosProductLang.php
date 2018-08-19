<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosProductLang
 *
 * @ORM\Table(name="pos_product_lang", indexes={@ORM\Index(name="id_lang", columns={"id_lang"}), @ORM\Index(name="name", columns={"name"})})
 * @ORM\Entity
 */
class PosProductLang
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_product", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idProduct;

    /**
     * @var int
     *
     * @ORM\Column(name="id_shop", type="integer", nullable=false, options={"default"="1","unsigned"=true})
     */
    private $idShop = '1';

    /**
     * @var int
     *
     * @ORM\Column(name="id_lang", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idLang;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=true)
     */
    private $description;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description_short", type="text", length=65535, nullable=true)
     */
    private $descriptionShort;

    /**
     * @var string
     *
     * @ORM\Column(name="link_rewrite", type="string", length=128, nullable=false)
     */
    private $linkRewrite;

    /**
     * @var string|null
     *
     * @ORM\Column(name="meta_description", type="string", length=255, nullable=true)
     */
    private $metaDescription;

    /**
     * @var string|null
     *
     * @ORM\Column(name="meta_keywords", type="string", length=255, nullable=true)
     */
    private $metaKeywords;

    /**
     * @var string|null
     *
     * @ORM\Column(name="meta_title", type="string", length=128, nullable=true)
     */
    private $metaTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=128, nullable=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="available_now", type="string", length=255, nullable=true)
     */
    private $availableNow;

    /**
     * @var string|null
     *
     * @ORM\Column(name="available_later", type="string", length=255, nullable=true)
     */
    private $availableLater;

    /**
     * @var string|null
     *
     * @ORM\Column(name="delivery_in_stock", type="string", length=255, nullable=true)
     */
    private $deliveryInStock;

    /**
     * @var string|null
     *
     * @ORM\Column(name="delivery_out_stock", type="string", length=255, nullable=true)
     */
    private $deliveryOutStock;

    public function getIdProduct(): ?int
    {
        return $this->idProduct;
    }

    public function setIdProduct(int $idProduct): self
    {
        $this->idProduct = $idProduct;

        return $this;
    }

    public function getIdShop(): ?int
    {
        return $this->idShop;
    }

    public function setIdShop(int $idShop): self
    {
        $this->idShop = $idShop;

        return $this;
    }

    public function getIdLang(): ?int
    {
        return $this->idLang;
    }

    public function setIdLang(int $idLang): self
    {
        $this->idLang = $idLang;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDescriptionShort(): ?string
    {
        return $this->descriptionShort;
    }

    public function setDescriptionShort(?string $descriptionShort): self
    {
        $this->descriptionShort = $descriptionShort;

        return $this;
    }

    public function getLinkRewrite(): ?string
    {
        return $this->linkRewrite;
    }

    public function setLinkRewrite(string $linkRewrite): self
    {
        $this->linkRewrite = $linkRewrite;

        return $this;
    }

    public function getMetaDescription(): ?string
    {
        return $this->metaDescription;
    }

    public function setMetaDescription(?string $metaDescription): self
    {
        $this->metaDescription = $metaDescription;

        return $this;
    }

    public function getMetaKeywords(): ?string
    {
        return $this->metaKeywords;
    }

    public function setMetaKeywords(?string $metaKeywords): self
    {
        $this->metaKeywords = $metaKeywords;

        return $this;
    }

    public function getMetaTitle(): ?string
    {
        return $this->metaTitle;
    }

    public function setMetaTitle(?string $metaTitle): self
    {
        $this->metaTitle = $metaTitle;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAvailableNow(): ?string
    {
        return $this->availableNow;
    }

    public function setAvailableNow(?string $availableNow): self
    {
        $this->availableNow = $availableNow;

        return $this;
    }

    public function getAvailableLater(): ?string
    {
        return $this->availableLater;
    }

    public function setAvailableLater(?string $availableLater): self
    {
        $this->availableLater = $availableLater;

        return $this;
    }

    public function getDeliveryInStock(): ?string
    {
        return $this->deliveryInStock;
    }

    public function setDeliveryInStock(?string $deliveryInStock): self
    {
        $this->deliveryInStock = $deliveryInStock;

        return $this;
    }

    public function getDeliveryOutStock(): ?string
    {
        return $this->deliveryOutStock;
    }

    public function setDeliveryOutStock(?string $deliveryOutStock): self
    {
        $this->deliveryOutStock = $deliveryOutStock;

        return $this;
    }


}
