<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\Shipment;

class Address
{
    public function __construct(
        public string $name1,
        public string $street,
        public string $country,
        public string $zipCode,
        public string $city,
        public ?string $name2 = null,
        public ?string $houseNo = null,
        public ?string $street2 = null,
        public ?string $state = null,
        public ?int $gln = null,
        public ?string $customerNumber = null,
        public ?string $type = null,
        public ?string $contact = null,
        public ?string $phone = null,
        public ?string $fax = null,
        public ?string $email = null,
        public ?string $comment = null,
        public ?string $eoriNumber = null,
        public ?string $vatNumber = null,
        public ?string $idDocType = null,
        public ?string $idDocNumber = null,
        public ?string $webSite = null,
        public ?string $referenceNumber = null,
        public ?string $destinationCountryRegistration = null
    ) {
    }
}
