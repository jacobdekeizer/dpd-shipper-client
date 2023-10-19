<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\Shipment;

class Notification
{
    public function __construct(
        public NotificationChannel $channel,
        public string $value,
        public ?string $language = null
    ) {
    }
}
