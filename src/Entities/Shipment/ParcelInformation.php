<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\Shipment;

class ParcelInformation
{
    public function __construct(public string $parcelLabelNumber, public ?string $dpdReference = null)
    {
    }
}
