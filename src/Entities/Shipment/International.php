<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Entities\Shipment;

class International
{
    public function __construct(
        public bool $parcelType,
        public int $customsAmount,
        public string $customsCurrency,
        public int $customsAmountEx,
        public string $customsCurrencyEx,
        public string $exportReason,
        public string $customsTerms,
        public string $customsContent,
        public string $customsInvoice,
        public int $customsInvoiceDate,
        public Address $commercialInvoiceConsignee,
        public Address $commercialInvoiceConsignor,
        /**
         * @var InternationalLine[]
         */
        public array $commercialInvoiceLine,
        public ?string $clearanceCleared = null,
        public ?string $prealertStatus = null,
        public ?string $customsPaper = null,
        public ?bool $customsEnclosure = null,
        public ?int $customsAmountParcel = null,
        public ?string $linehaul = null,
        public ?string $shipMrn = null,
        public ?bool $collectiveCustomsClearance = null,
        public ?string $comment1 = null,
        public ?string $comment2 = null,
        public ?string $commercialInvoiceConsigneeVatNumber = null
    ) {
    }
}
