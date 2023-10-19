<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\Shipment;

class StoreOrdersRequest
{
    public function __construct(
        /** @var Order[] */
        public array $order,
        public ?PrintOptions $printOptions = null
    ) {
    }
}
