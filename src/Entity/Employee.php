<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Employee
 *
 * @ORM\Table(name="pos_employee", indexes={@ORM\Index(name="employee_login", columns={"email", "passwd"}), @ORM\Index(name="id_employee_passwd", columns={"id_employee", "passwd"}), @ORM\Index(name="id_profile", columns={"id_profile"})})
 * @ORM\Entity
 */
class Employee
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_employee", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idEmployee;

    /**
     * @var int
     *
     * @ORM\Column(name="id_profile", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idProfile;

    /**
     * @var int
     *
     * @ORM\Column(name="id_lang", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idLang = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=32, nullable=false)
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=32, nullable=false)
     */
    private $firstname;

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
     * @ORM\Column(name="stats_date_from", type="date", nullable=true)
     */
    private $statsDateFrom;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="stats_date_to", type="date", nullable=true)
     */
    private $statsDateTo;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="stats_compare_from", type="date", nullable=true)
     */
    private $statsCompareFrom;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="stats_compare_to", type="date", nullable=true)
     */
    private $statsCompareTo;

    /**
     * @var int
     *
     * @ORM\Column(name="stats_compare_option", type="integer", nullable=false, options={"default"="1","unsigned"=true})
     */
    private $statsCompareOption = '1';

    /**
     * @var string|null
     *
     * @ORM\Column(name="preselect_date_range", type="string", length=32, nullable=true)
     */
    private $preselectDateRange;

    /**
     * @var string|null
     *
     * @ORM\Column(name="bo_color", type="string", length=32, nullable=true)
     */
    private $boColor;

    /**
     * @var string|null
     *
     * @ORM\Column(name="bo_theme", type="string", length=32, nullable=true)
     */
    private $boTheme;

    /**
     * @var string|null
     *
     * @ORM\Column(name="bo_css", type="string", length=64, nullable=true)
     */
    private $boCss;

    /**
     * @var int
     *
     * @ORM\Column(name="default_tab", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $defaultTab = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="bo_width", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $boWidth = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="bo_menu", type="boolean", nullable=false, options={"default"="1"})
     */
    private $boMenu = '1';

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean", nullable=false)
     */
    private $active = '0';

    /**
     * @var bool
     *
     * @ORM\Column(name="optin", type="boolean", nullable=false, options={"default"="1"})
     */
    private $optin = '1';

    /**
     * @var int
     *
     * @ORM\Column(name="id_last_order", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idLastOrder = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="id_last_customer_message", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idLastCustomerMessage = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="id_last_customer", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idLastCustomer = '0';

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="last_connection_date", type="date", nullable=true)
     */
    private $lastConnectionDate;

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

    public function getIdEmployee(): ?int
    {
        return $this->idEmployee;
    }

    public function setIdEmployee(int $idEmployee): self
    {
        $this->idEmployee = $idEmployee;

        return $this;
    }

    public function getIdProfile(): ?int
    {
        return $this->idProfile;
    }

    public function setIdProfile(int $idProfile): self
    {
        $this->idProfile = $idProfile;

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

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

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

    public function getStatsDateFrom(): ?\DateTimeInterface
    {
        return $this->statsDateFrom;
    }

    public function setStatsDateFrom(?\DateTimeInterface $statsDateFrom): self
    {
        $this->statsDateFrom = $statsDateFrom;

        return $this;
    }

    public function getStatsDateTo(): ?\DateTimeInterface
    {
        return $this->statsDateTo;
    }

    public function setStatsDateTo(?\DateTimeInterface $statsDateTo): self
    {
        $this->statsDateTo = $statsDateTo;

        return $this;
    }

    public function getStatsCompareFrom(): ?\DateTimeInterface
    {
        return $this->statsCompareFrom;
    }

    public function setStatsCompareFrom(?\DateTimeInterface $statsCompareFrom): self
    {
        $this->statsCompareFrom = $statsCompareFrom;

        return $this;
    }

    public function getStatsCompareTo(): ?\DateTimeInterface
    {
        return $this->statsCompareTo;
    }

    public function setStatsCompareTo(?\DateTimeInterface $statsCompareTo): self
    {
        $this->statsCompareTo = $statsCompareTo;

        return $this;
    }

    public function getStatsCompareOption(): ?int
    {
        return $this->statsCompareOption;
    }

    public function setStatsCompareOption(int $statsCompareOption): self
    {
        $this->statsCompareOption = $statsCompareOption;

        return $this;
    }

    public function getPreselectDateRange(): ?string
    {
        return $this->preselectDateRange;
    }

    public function setPreselectDateRange(?string $preselectDateRange): self
    {
        $this->preselectDateRange = $preselectDateRange;

        return $this;
    }

    public function getBoColor(): ?string
    {
        return $this->boColor;
    }

    public function setBoColor(?string $boColor): self
    {
        $this->boColor = $boColor;

        return $this;
    }

    public function getBoTheme(): ?string
    {
        return $this->boTheme;
    }

    public function setBoTheme(?string $boTheme): self
    {
        $this->boTheme = $boTheme;

        return $this;
    }

    public function getBoCss(): ?string
    {
        return $this->boCss;
    }

    public function setBoCss(?string $boCss): self
    {
        $this->boCss = $boCss;

        return $this;
    }

    public function getDefaultTab(): ?int
    {
        return $this->defaultTab;
    }

    public function setDefaultTab(int $defaultTab): self
    {
        $this->defaultTab = $defaultTab;

        return $this;
    }

    public function getBoWidth(): ?int
    {
        return $this->boWidth;
    }

    public function setBoWidth(int $boWidth): self
    {
        $this->boWidth = $boWidth;

        return $this;
    }

    public function getBoMenu(): ?bool
    {
        return $this->boMenu;
    }

    public function setBoMenu(bool $boMenu): self
    {
        $this->boMenu = $boMenu;

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

    public function getOptin(): ?bool
    {
        return $this->optin;
    }

    public function setOptin(bool $optin): self
    {
        $this->optin = $optin;

        return $this;
    }

    public function getIdLastOrder(): ?int
    {
        return $this->idLastOrder;
    }

    public function setIdLastOrder(int $idLastOrder): self
    {
        $this->idLastOrder = $idLastOrder;

        return $this;
    }

    public function getIdLastCustomerMessage(): ?int
    {
        return $this->idLastCustomerMessage;
    }

    public function setIdLastCustomerMessage(int $idLastCustomerMessage): self
    {
        $this->idLastCustomerMessage = $idLastCustomerMessage;

        return $this;
    }

    public function getIdLastCustomer(): ?int
    {
        return $this->idLastCustomer;
    }

    public function setIdLastCustomer(int $idLastCustomer): self
    {
        $this->idLastCustomer = $idLastCustomer;

        return $this;
    }

    public function getLastConnectionDate(): ?\DateTimeInterface
    {
        return $this->lastConnectionDate;
    }

    public function setLastConnectionDate(?\DateTimeInterface $lastConnectionDate): self
    {
        $this->lastConnectionDate = $lastConnectionDate;

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
