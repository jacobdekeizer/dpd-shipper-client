<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\Shipment;

class ParcelShopDelivery
{
    public function __construct(public int $parcelShopId, public Notification $parcelShopNotification)
    {
    }
}
