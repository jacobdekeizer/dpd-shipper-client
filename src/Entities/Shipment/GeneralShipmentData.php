<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\Shipment;

class GeneralShipmentData
{
    public function __construct(
        public string $sendingDepot,
        public ShipmentProduct $product,
        public Address $sender,
        public Address $recipient,
        public ?string $mpsId = null,
        public ?string $cUser = null,
        public ?string $mpsCustomerReferenceNumber1 = null,
        public ?string $mpsCustomerReferenceNumber2 = null,
        public ?string $mpsCustomerReferenceNumber3 = null,
        public ?string $mpsCustomerReferenceNumber4 = null,
        public ?string $identificationNumber = null,
        public ?bool $mpsCompleteDelivery = null,
        public ?bool $mpsCompleteDeliveryLabel = null,
        public ?int $mpsVolume = null,
        public ?int $mpsWeight = null,
        public ?string $mpsExpectedSendingDate = null,
        public ?string $mpsExpectedSendingTime = null
    ) {
    }
}
