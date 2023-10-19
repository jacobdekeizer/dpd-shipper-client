<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\Shipment;

class PrintOptions
{
    public function __construct(
        public PrinterLanguage $printerLanguage,
        public PaperFormat $paperFormat,
        public ?Printer $printer = null,
        public ?StartPosition $startPosition = null,
        public ?float $printerResolution = null,
        public ?bool $isELabel = null
    ) {
    }
}
