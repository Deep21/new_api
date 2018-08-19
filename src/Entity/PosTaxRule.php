<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosTaxRule
 *
 * @ORM\Table(name="pos_tax_rule", indexes={@ORM\Index(name="id_tax_rules_group", columns={"id_tax_rules_group"}), @ORM\Index(name="id_tax", columns={"id_tax"}), @ORM\Index(name="category_getproducts", columns={"id_tax_rules_group", "id_country", "id_state", "zipcode_from"})})
 * @ORM\Entity
 */
class PosTaxRule
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_tax_rule", type="integer", nullable=false)
     */
    private $idTaxRule;

    /**
     * @var int
     *
     * @ORM\Column(name="id_tax_rules_group", type="integer", nullable=false)
     */
    private $idTaxRulesGroup;

    /**
     * @var int
     *
     * @ORM\Column(name="id_country", type="integer", nullable=false)
     */
    private $idCountry;

    /**
     * @var int
     *
     * @ORM\Column(name="id_state", type="integer", nullable=false)
     */
    private $idState;

    /**
     * @var string
     *
     * @ORM\Column(name="zipcode_from", type="string", length=12, nullable=false)
     */
    private $zipcodeFrom;

    /**
     * @var string
     *
     * @ORM\Column(name="zipcode_to", type="string", length=12, nullable=false)
     */
    private $zipcodeTo;

    /**
     * @var int
     *
     * @ORM\Column(name="id_tax", type="integer", nullable=false)
     */
    private $idTax;

    /**
     * @var int
     *
     * @ORM\Column(name="behavior", type="integer", nullable=false)
     */
    private $behavior;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=100, nullable=false)
     */
    private $description;

    public function getIdTaxRule(): ?int
    {
        return $this->idTaxRule;
    }

    public function setIdTaxRule(int $idTaxRule): self
    {
        $this->idTaxRule = $idTaxRule;

        return $this;
    }

    public function getIdTaxRulesGroup(): ?int
    {
        return $this->idTaxRulesGroup;
    }

    public function setIdTaxRulesGroup(int $idTaxRulesGroup): self
    {
        $this->idTaxRulesGroup = $idTaxRulesGroup;

        return $this;
    }

    public function getIdCountry(): ?int
    {
        return $this->idCountry;
    }

    public function setIdCountry(int $idCountry): self
    {
        $this->idCountry = $idCountry;

        return $this;
    }

    public function getIdState(): ?int
    {
        return $this->idState;
    }

    public function setIdState(int $idState): self
    {
        $this->idState = $idState;

        return $this;
    }

    public function getZipcodeFrom(): ?string
    {
        return $this->zipcodeFrom;
    }

    public function setZipcodeFrom(string $zipcodeFrom): self
    {
        $this->zipcodeFrom = $zipcodeFrom;

        return $this;
    }

    public function getZipcodeTo(): ?string
    {
        return $this->zipcodeTo;
    }

    public function setZipcodeTo(string $zipcodeTo): self
    {
        $this->zipcodeTo = $zipcodeTo;

        return $this;
    }

    public function getIdTax(): ?int
    {
        return $this->idTax;
    }

    public function setIdTax(int $idTax): self
    {
        $this->idTax = $idTax;

        return $this;
    }

    public function getBehavior(): ?int
    {
        return $this->behavior;
    }

    public function setBehavior(int $behavior): self
    {
        $this->behavior = $behavior;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }


}
