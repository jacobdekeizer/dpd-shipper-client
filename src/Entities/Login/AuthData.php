<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\Login;

use DateTime;

class AuthData
{
    public function __construct(
        public string $delisId,
        public string $customerUid,
        public string $authToken,
        public string $depot,
        public DateTime $authTokenExpires
    ) {
    }
}
