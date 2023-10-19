<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\ParcelShopFinder;

class ParcelShop
{
    public function __construct(
        public ?int $parcelShopId = null,
        public ?string $pudoId = null,
        public ?string $company = null,
        public ?string $street = null,
        public ?string $houseNo = null,
        public ?string $country = null,
        public ?int $countryNum = null,
        public ?string $state = null,
        public ?string $zipCode = null,
        public ?string $city = null,
        public ?string $town = null,
        public ?string $phone = null,
        public ?string $fax = null,
        public ?string $email = null,
        public ?string $homepage = null,
        public ?float $latitude = null,
        public ?float $longitude = null,
        public ?float $coordinateX = null,
        public ?float $coordinateY = null,
        public ?float $coordinateZ = null,
        public ?float $distance = null,
        public ?string $expressPickupTime = null,
        public ?string $extraInfo = null,
        /**
         * @var OpeningHours[]
         */
        public ?array $openingHours = null,
        /**
         * @var Holiday[]
         */
        public ?array $holiday = null,
        public ?ServiceType $services = null
    ) {
    }
}
