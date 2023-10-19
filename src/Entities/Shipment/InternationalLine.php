<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\Shipment;

class InternationalLine
{
    public function __construct(
        public string $customsTarif,
        public string $receiverCustomsTarif,
        public string $content,
        public int $grossWeight,
        public int $itemsNumber,
        public int $amountLine,
        public ?string $productCode = null,
        public ?string $customsOrigin = null,
        public ?string $invoicePosition = null
    ) {
    }
}
