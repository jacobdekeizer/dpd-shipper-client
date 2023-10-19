<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Configuration;

class UrlConfiguration
{
    public function __construct(
        public string $stagingUrl = 'https://shipperadmintest.dpd.nl/PublicAPI/WSDL/',
        public string $productionUrl = 'https://wsshipper.dpd.nl/soap/WSDL/',
        // Is http, is used as a soap namespace.
        public string $authenticationUrl = 'http://dpd.com/common/service/types/Authentication/2.0',
    ) {
    }
}
