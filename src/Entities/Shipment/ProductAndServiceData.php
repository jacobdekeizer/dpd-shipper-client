<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\Shipment;

class ProductAndServiceData
{
    public function __construct(
        public OrderType $orderType,
        public ?bool $saturdayDelivery = null,
        public ?bool $exWorksDelivery = null,
        public ?bool $tyres = null,
        public ?ParcelShopDelivery $parcelShopDelivery = null,
        public ?Notification $parcelShopNotification = null,
        public ?Notification $predict = null,
        public ?bool $ageCheck = null
    ) {
    }
}
