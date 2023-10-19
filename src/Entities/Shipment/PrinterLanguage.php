<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\Shipment;

enum PrinterLanguage: string
{
    case PDF = 'PDF';
    case ZPL = 'ZPL';
}
