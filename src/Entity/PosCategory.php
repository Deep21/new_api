<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosCategory
 *
 * @ORM\Table(name="pos_category", indexes={@ORM\Index(name="category_parent", columns={"id_parent"}), @ORM\Index(name="nleftrightactive", columns={"nleft", "nright", "active"}), @ORM\Index(name="level_depth", columns={"level_depth"}), @ORM\Index(name="nright", columns={"nright"}), @ORM\Index(name="activenleft", columns={"active", "nleft"}), @ORM\Index(name="activenright", columns={"active", "nright"})})
 * @ORM\Entity
 */
class PosCategory
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_category", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idCategory;

    /**
     * @var int
     *
     * @ORM\Column(name="id_parent", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idParent;

    /**
     * @var int
     *
     * @ORM\Column(name="id_shop_default", type="integer", nullable=false, options={"default"="1","unsigned"=true})
     */
    private $idShopDefault = '1';

    /**
     * @var bool
     *
     * @ORM\Column(name="level_depth", type="boolean", nullable=false)
     */
    private $levelDepth = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="nleft", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $nleft = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="nright", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $nright = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    private $active = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_add", type="datetime", nullable=false)
     */
    private $dateAdd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_upd", type="datetime", nullable=false)
     */
    private $dateUpd;

    /**
     * @var int
     *
     * @ORM\Column(name="position", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $position = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="is_root_category", type="boolean", nullable=false)
     */
    private $isRootCategory = '0';

    public function getIdCategory(): ?int
    {
        return $this->idCategory;
    }

    public function setIdCategory(int $idCategory): self
    {
        $this->idCategory = $idCategory;

        return $this;
    }

    public function getIdParent(): ?int
    {
        return $this->idParent;
    }

    public function setIdParent(int $idParent): self
    {
        $this->idParent = $idParent;

        return $this;
    }

    public function getIdShopDefault(): ?int
    {
        return $this->idShopDefault;
    }

    public function setIdShopDefault(int $idShopDefault): self
    {
        $this->idShopDefault = $idShopDefault;

        return $this;
    }

    public function getLevelDepth(): ?bool
    {
        return $this->levelDepth;
    }

    public function setLevelDepth(bool $levelDepth): self
    {
        $this->levelDepth = $levelDepth;

        return $this;
    }

    public function getNleft(): ?int
    {
        return $this->nleft;
    }

    public function setNleft(int $nleft): self
    {
        $this->nleft = $nleft;

        return $this;
    }

    public function getNright(): ?int
    {
        return $this->nright;
    }

    public function setNright(int $nright): self
    {
        $this->nright = $nright;

        return $this;
    }

    public function getActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getDateAdd(): ?\DateTimeInterface
    {
        return $this->dateAdd;
    }

    public function setDateAdd(\DateTimeInterface $dateAdd): self
    {
        $this->dateAdd = $dateAdd;

        return $this;
    }

    public function getDateUpd(): ?\DateTimeInterface
    {
        return $this->dateUpd;
    }

    public function setDateUpd(\DateTimeInterface $dateUpd): self
    {
        $this->dateUpd = $dateUpd;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getIsRootCategory(): ?bool
    {
        return $this->isRootCategory;
    }

    public function setIsRootCategory(bool $isRootCategory): self
    {
        $this->isRootCategory = $isRootCategory;

        return $this;
    }


}
