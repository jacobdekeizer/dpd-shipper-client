<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\Shipment;

enum ShipmentProduct: string
{
    case InternationalExpress = 'IE2';
    case Express10h = 'E10';
    case Express12h = 'E12';
    case Express18h = 'E18';
    case B2B = 'B2B';
    case CL = 'CL';
}
