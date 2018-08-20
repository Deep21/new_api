<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customer
 *
 * @ORM\Table(name="pos_customer", indexes={@ORM\Index(name="customer_email", columns={"email"}), @ORM\Index(name="customer_login", columns={"email", "passwd"}), @ORM\Index(name="id_customer_passwd", columns={"id_customer", "passwd"}), @ORM\Index(name="id_gender", columns={"id_gender"}), @ORM\Index(name="id_shop_group", columns={"id_shop_group"}), @ORM\Index(name="id_shop", columns={"id_shop", "date_add"})})
 * @ORM\Entity
 */
class Customer
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_customer", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idCustomer;

    /**
     * @var int
     *
     * @ORM\Column(name="id_shop_group", type="integer", nullable=false, options={"default"="1","unsigned"=true})
     */
    private $idShopGroup = '1';

    /**
     * @var int
     *
     * @ORM\Column(name="id_shop", type="integer", nullable=false, options={"default"="1","unsigned"=true})
     */
    private $idShop = '1';

    /**
     * @var int
     *
     * @ORM\Column(name="id_gender", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idGender;

    /**
     * @var int
     *
     * @ORM\Column(name="id_default_group", type="integer", nullable=false, options={"default"="1","unsigned"=true})
     */
    private $idDefaultGroup = '1';

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_lang", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $idLang;

    /**
     * @var int
     *
     * @ORM\Column(name="id_risk", type="integer", nullable=false, options={"default"="1","unsigned"=true})
     */
    private $idRisk = '1';

    /**
     * @var string|null
     *
     * @ORM\Column(name="company", type="string", length=64, nullable=true)
     */
    private $company;

    /**
     * @var string|null
     *
     * @ORM\Column(name="siret", type="string", length=14, nullable=true)
     */
    private $siret;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ape", type="string", length=5, nullable=true)
     */
    private $ape;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255, nullable=false)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=128, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="passwd", type="string", length=60, nullable=false)
     */
    private $passwd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_passwd_gen", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $lastPasswdGen = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="birthday", type="date", nullable=true)
     */
    private $birthday;

    /**
     * @var bool
     *
     * @ORM\Column(name="newsletter", type="boolean", nullable=false)
     */
    private $newsletter = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="ip_registration_newsletter", type="string", length=15, nullable=true)
     */
    private $ipRegistrationNewsletter;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="newsletter_date_add", type="datetime", nullable=true)
     */
    private $newsletterDateAdd;

    /**
     * @var bool
     *
     * @ORM\Column(name="optin", type="boolean", nullable=false)
     */
    private $optin = '0';

    /**
     * @var string|null
     *
     * @ORM\Column(name="website", type="string", length=128, nullable=true)
     */
    private $website;

    /**
     * @var string
     *
     * @ORM\Column(name="outstanding_allow_amount", type="decimal", precision=20, scale=6, nullable=false, options={"default"="0.000000"})
     */
    private $outstandingAllowAmount = '0.000000';

    /**
     * @var bool
     *
     * @ORM\Column(name="show_public_prices", type="boolean", nullable=false)
     */
    private $showPublicPrices = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="max_payment_days", type="integer", nullable=false, options={"default"="60","unsigned"=true})
     */
    private $maxPaymentDays = '60';

    /**
     * @var string
     *
     * @ORM\Column(name="secure_key", type="string", length=32, nullable=false, options={"default"="-1"})
     */
    private $secureKey = '-1';

    /**
     * @var string|null
     *
     * @ORM\Column(name="note", type="text", length=65535, nullable=true)
     */
    private $note;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    private $active = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="is_guest", type="boolean", nullable=false)
     */
    private $isGuest = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="deleted", type="boolean", nullable=false)
     */
    private $deleted = '0';

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
     * @var string|null
     *
     * @ORM\Column(name="reset_password_token", type="string", length=40, nullable=true)
     */
    private $resetPasswordToken;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="reset_password_validity", type="datetime", nullable=true)
     */
    private $resetPasswordValidity;

    public function getIdCustomer(): ?int
    {
        return $this->idCustomer;
    }

    public function setIdCustomer(int $idCustomer): self
    {
        $this->idCustomer = $idCustomer;

        return $this;
    }

    public function getIdShopGroup(): ?int
    {
        return $this->idShopGroup;
    }

    public function setIdShopGroup(int $idShopGroup): self
    {
        $this->idShopGroup = $idShopGroup;

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

    public function getIdGender(): ?int
    {
        return $this->idGender;
    }

    public function setIdGender(int $idGender): self
    {
        $this->idGender = $idGender;

        return $this;
    }

    public function getIdDefaultGroup(): ?int
    {
        return $this->idDefaultGroup;
    }

    public function setIdDefaultGroup(int $idDefaultGroup): self
    {
        $this->idDefaultGroup = $idDefaultGroup;

        return $this;
    }

    public function getIdLang(): ?int
    {
        return $this->idLang;
    }

    public function setIdLang(?int $idLang): self
    {
        $this->idLang = $idLang;

        return $this;
    }

    public function getIdRisk(): ?int
    {
        return $this->idRisk;
    }

    public function setIdRisk(int $idRisk): self
    {
        $this->idRisk = $idRisk;

        return $this;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(?string $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getSiret(): ?string
    {
        return $this->siret;
    }

    public function setSiret(?string $siret): self
    {
        $this->siret = $siret;

        return $this;
    }

    public function getApe(): ?string
    {
        return $this->ape;
    }

    public function setApe(?string $ape): self
    {
        $this->ape = $ape;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPasswd(): ?string
    {
        return $this->passwd;
    }

    public function setPasswd(string $passwd): self
    {
        $this->passwd = $passwd;

        return $this;
    }

    public function getLastPasswdGen(): ?\DateTimeInterface
    {
        return $this->lastPasswdGen;
    }

    public function setLastPasswdGen(\DateTimeInterface $lastPasswdGen): self
    {
        $this->lastPasswdGen = $lastPasswdGen;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(?\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getNewsletter(): ?bool
    {
        return $this->newsletter;
    }

    public function setNewsletter(bool $newsletter): self
    {
        $this->newsletter = $newsletter;

        return $this;
    }

    public function getIpRegistrationNewsletter(): ?string
    {
        return $this->ipRegistrationNewsletter;
    }

    public function setIpRegistrationNewsletter(?string $ipRegistrationNewsletter): self
    {
        $this->ipRegistrationNewsletter = $ipRegistrationNewsletter;

        return $this;
    }

    public function getNewsletterDateAdd(): ?\DateTimeInterface
    {
        return $this->newsletterDateAdd;
    }

    public function setNewsletterDateAdd(?\DateTimeInterface $newsletterDateAdd): self
    {
        $this->newsletterDateAdd = $newsletterDateAdd;

        return $this;
    }

    public function getOptin(): ?bool
    {
        return $this->optin;
    }

    public function setOptin(bool $optin): self
    {
        $this->optin = $optin;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): self
    {
        $this->website = $website;

        return $this;
    }

    public function getOutstandingAllowAmount()
    {
        return $this->outstandingAllowAmount;
    }

    public function setOutstandingAllowAmount($outstandingAllowAmount): self
    {
        $this->outstandingAllowAmount = $outstandingAllowAmount;

        return $this;
    }

    public function getShowPublicPrices(): ?bool
    {
        return $this->showPublicPrices;
    }

    public function setShowPublicPrices(bool $showPublicPrices): self
    {
        $this->showPublicPrices = $showPublicPrices;

        return $this;
    }

    public function getMaxPaymentDays(): ?int
    {
        return $this->maxPaymentDays;
    }

    public function setMaxPaymentDays(int $maxPaymentDays): self
    {
        $this->maxPaymentDays = $maxPaymentDays;

        return $this;
    }

    public function getSecureKey(): ?string
    {
        return $this->secureKey;
    }

    public function setSecureKey(string $secureKey): self
    {
        $this->secureKey = $secureKey;

        return $this;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(?string $note): self
    {
        $this->note = $note;

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

    public function getIsGuest(): ?bool
    {
        return $this->isGuest;
    }

    public function setIsGuest(bool $isGuest): self
    {
        $this->isGuest = $isGuest;

        return $this;
    }

    public function getDeleted(): ?bool
    {
        return $this->deleted;
    }

    public function setDeleted(bool $deleted): self
    {
        $this->deleted = $deleted;

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

    public function getResetPasswordToken(): ?string
    {
        return $this->resetPasswordToken;
    }

    public function setResetPasswordToken(?string $resetPasswordToken): self
    {
        $this->resetPasswordToken = $resetPasswordToken;

        return $this;
    }

    public function getResetPasswordValidity(): ?\DateTimeInterface
    {
        return $this->resetPasswordValidity;
    }

    public function setResetPasswordValidity(?\DateTimeInterface $resetPasswordValidity): self
    {
        $this->resetPasswordValidity = $resetPasswordValidity;

        return $this;
    }


}
