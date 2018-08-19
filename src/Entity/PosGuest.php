<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PosGuest
 *
 * @ORM\Table(name="pos_guest", indexes={@ORM\Index(name="id_customer", columns={"id_customer"}), @ORM\Index(name="id_operating_system", columns={"id_operating_system"}), @ORM\Index(name="id_web_browser", columns={"id_web_browser"})})
 * @ORM\Entity
 */
class PosGuest
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_guest", type="integer", nullable=false, options={"unsigned"=true})
     */
    private $idGuest;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_operating_system", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $idOperatingSystem;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_web_browser", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $idWebBrowser;

    /**
     * @var int|null
     *
     * @ORM\Column(name="id_customer", type="integer", nullable=true, options={"unsigned"=true})
     */
    private $idCustomer;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="javascript", type="boolean", nullable=true)
     */
    private $javascript = '0';

    /**
     * @var int|null
     *
     * @ORM\Column(name="screen_resolution_x", type="smallint", nullable=true, options={"unsigned"=true})
     */
    private $screenResolutionX;

    /**
     * @var int|null
     *
     * @ORM\Column(name="screen_resolution_y", type="smallint", nullable=true, options={"unsigned"=true})
     */
    private $screenResolutionY;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="screen_color", type="boolean", nullable=true)
     */
    private $screenColor;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="sun_java", type="boolean", nullable=true)
     */
    private $sunJava;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="adobe_flash", type="boolean", nullable=true)
     */
    private $adobeFlash;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="adobe_director", type="boolean", nullable=true)
     */
    private $adobeDirector;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="apple_quicktime", type="boolean", nullable=true)
     */
    private $appleQuicktime;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="real_player", type="boolean", nullable=true)
     */
    private $realPlayer;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="windows_media", type="boolean", nullable=true)
     */
    private $windowsMedia;

    /**
     * @var string|null
     *
     * @ORM\Column(name="accept_language", type="string", length=8, nullable=true)
     */
    private $acceptLanguage;

    /**
     * @var bool
     *
     * @ORM\Column(name="mobile_theme", type="boolean", nullable=false)
     */
    private $mobileTheme = '0';

    public function getIdGuest(): ?int
    {
        return $this->idGuest;
    }

    public function setIdGuest(int $idGuest): self
    {
        $this->idGuest = $idGuest;

        return $this;
    }

    public function getIdOperatingSystem(): ?int
    {
        return $this->idOperatingSystem;
    }

    public function setIdOperatingSystem(?int $idOperatingSystem): self
    {
        $this->idOperatingSystem = $idOperatingSystem;

        return $this;
    }

    public function getIdWebBrowser(): ?int
    {
        return $this->idWebBrowser;
    }

    public function setIdWebBrowser(?int $idWebBrowser): self
    {
        $this->idWebBrowser = $idWebBrowser;

        return $this;
    }

    public function getIdCustomer(): ?int
    {
        return $this->idCustomer;
    }

    public function setIdCustomer(?int $idCustomer): self
    {
        $this->idCustomer = $idCustomer;

        return $this;
    }

    public function getJavascript(): ?bool
    {
        return $this->javascript;
    }

    public function setJavascript(?bool $javascript): self
    {
        $this->javascript = $javascript;

        return $this;
    }

    public function getScreenResolutionX(): ?int
    {
        return $this->screenResolutionX;
    }

    public function setScreenResolutionX(?int $screenResolutionX): self
    {
        $this->screenResolutionX = $screenResolutionX;

        return $this;
    }

    public function getScreenResolutionY(): ?int
    {
        return $this->screenResolutionY;
    }

    public function setScreenResolutionY(?int $screenResolutionY): self
    {
        $this->screenResolutionY = $screenResolutionY;

        return $this;
    }

    public function getScreenColor(): ?bool
    {
        return $this->screenColor;
    }

    public function setScreenColor(?bool $screenColor): self
    {
        $this->screenColor = $screenColor;

        return $this;
    }

    public function getSunJava(): ?bool
    {
        return $this->sunJava;
    }

    public function setSunJava(?bool $sunJava): self
    {
        $this->sunJava = $sunJava;

        return $this;
    }

    public function getAdobeFlash(): ?bool
    {
        return $this->adobeFlash;
    }

    public function setAdobeFlash(?bool $adobeFlash): self
    {
        $this->adobeFlash = $adobeFlash;

        return $this;
    }

    public function getAdobeDirector(): ?bool
    {
        return $this->adobeDirector;
    }

    public function setAdobeDirector(?bool $adobeDirector): self
    {
        $this->adobeDirector = $adobeDirector;

        return $this;
    }

    public function getAppleQuicktime(): ?bool
    {
        return $this->appleQuicktime;
    }

    public function setAppleQuicktime(?bool $appleQuicktime): self
    {
        $this->appleQuicktime = $appleQuicktime;

        return $this;
    }

    public function getRealPlayer(): ?bool
    {
        return $this->realPlayer;
    }

    public function setRealPlayer(?bool $realPlayer): self
    {
        $this->realPlayer = $realPlayer;

        return $this;
    }

    public function getWindowsMedia(): ?bool
    {
        return $this->windowsMedia;
    }

    public function setWindowsMedia(?bool $windowsMedia): self
    {
        $this->windowsMedia = $windowsMedia;

        return $this;
    }

    public function getAcceptLanguage(): ?string
    {
        return $this->acceptLanguage;
    }

    public function setAcceptLanguage(?string $acceptLanguage): self
    {
        $this->acceptLanguage = $acceptLanguage;

        return $this;
    }

    public function getMobileTheme(): ?bool
    {
        return $this->mobileTheme;
    }

    public function setMobileTheme(bool $mobileTheme): self
    {
        $this->mobileTheme = $mobileTheme;

        return $this;
    }


}
