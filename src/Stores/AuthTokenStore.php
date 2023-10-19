<?php

namespace JacobDeKeizer\DpdShipper\Stores;

use JacobDeKeizer\DpdShipper\Entities\Login\AuthData;
use JacobDeKeizer\DpdShipper\Exceptions\AuthStorageException;

interface AuthTokenStore
{
    /**
     * @throws AuthStorageException
     */
    public function store(AuthData $authData): void;

    /**
     * @throws AuthStorageException
     */
    public function retrieve(): ?AuthData;
}
