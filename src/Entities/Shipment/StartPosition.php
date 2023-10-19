<?php

namespace JacobDeKeizer\DpdShipper\Entities\Shipment;

enum StartPosition: string
{
    case UpperLeft = 'UPPER_LEFT';
    case UpperRight = 'UPPER_RIGHT';
    case LowerLeft = 'LOWER_LEFT';
    case LowerRight = 'LOWER_RIGHT';
}
