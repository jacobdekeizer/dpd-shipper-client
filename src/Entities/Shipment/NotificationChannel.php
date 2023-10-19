<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\Shipment;

enum NotificationChannel: int
{
    case Email = 1;
    case Sms = 3;
}
