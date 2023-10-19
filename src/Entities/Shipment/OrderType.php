<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\Shipment;

enum OrderType: string
{
    case Consignment = 'consignment';
    case Collection = 'collection';
}
