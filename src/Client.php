<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper;

use JacobDeKeizer\DpdShipper\Configuration\AccountConfiguration;
use JacobDeKeizer\DpdShipper\Configuration\UrlConfiguration;
use JacobDeKeizer\DpdShipper\Endpoints\LoginEndpoint;
use JacobDeKeizer\DpdShipper\Endpoints\ParcelShopFinderEndpoint;
use JacobDeKeizer\DpdShipper\Endpoints\ShipmentEndpoint;
use JacobDeKeizer\DpdShipper\Stores\AuthTokenStore;

class Client
{
    public function __construct(
        private AuthTokenStore $authTokenStore,
        private AccountConfiguration $accountConfiguration,
        private UrlConfiguration $urlConfiguration = new UrlConfiguration(),
        private string $locale = 'en_US',
        private bool $staging = false
    ) {
    }

    public function getAuthTokenStore(): AuthTokenStore
    {
        return $this->authTokenStore;
    }

    public function setAuthTokenStore(AuthTokenStore $authTokenStore): Client
    {
        $this->authTokenStore = $authTokenStore;
        return $this;
    }

    public function isStaging(): bool
    {
        return $this->staging;
    }

    public function setStaging(bool $staging): Client
    {
        $this->staging = $staging;
        return $this;
    }

    public function getAccountConfiguration(): AccountConfiguration
    {
        return $this->accountConfiguration;
    }

    public function setAccountConfiguration(AccountConfiguration $accountConfiguration): Client
    {
        $this->accountConfiguration = $accountConfiguration;
        return $this;
    }

    public function getLocale(): string
    {
        return $this->locale;
    }

    public function setLocale(string $locale): Client
    {
        $this->locale = $locale;
        return $this;
    }

    public function getUrlConfiguration(): UrlConfiguration
    {
        return $this->urlConfiguration;
    }

    public function setUrlConfiguration(UrlConfiguration $urlConfiguration): Client
    {
        $this->urlConfiguration = $urlConfiguration;
        return $this;
    }

    public function login(): LoginEndpoint
    {
        return new LoginEndpoint($this);
    }

    public function parcelShopFinder(): ParcelShopFinderEndpoint
    {
        return new ParcelShopFinderEndpoint($this);
    }

    public function shipment(): ShipmentEndpoint
    {
        return new ShipmentEndpoint($this);
    }
}
