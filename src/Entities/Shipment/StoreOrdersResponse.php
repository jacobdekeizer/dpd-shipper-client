<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\Shipment;

class StoreOrdersResponse
{
    public function __construct(public StoreOrderResult $orderResult)
    {
    }
}
