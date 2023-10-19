<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\Shipment;

class Printer
{
    public function __construct(
        public float $offsetX,
        public float $offsetY,
        public string $connectionType,
        public bool $barcodeCapable2D,
        public ?string $manufacturer = null,
        public ?string $model = null,
        public ?string $revision = null
    ) {
    }
}
