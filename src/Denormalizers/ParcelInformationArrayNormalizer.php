<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Denormalizers;

use JacobDeKeizer\DpdShipper\Entities\Shipment\ParcelInformation;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class ParcelInformationArrayNormalizer implements DenormalizerInterface
{
    public function __construct(private readonly ObjectNormalizer $objectNormalizer)
    {
    }

    /**
     * @param array<string, mixed> $context
     */
    public function denormalize(mixed $data, string $type, string $format = null, array $context = []): mixed
    {
        // The parcel information sometimes returns an object and sometimes an array of objects.
        // We convert it to always an array here
        $data = is_array($data) ? $data : [$data];

        return array_map(
            fn (mixed $data) => $this->objectNormalizer->denormalize($data, ParcelInformation::class, $format),
            $data
        );
    }

    public function supportsDenormalization(mixed $data, string $type, string $format = null, array $context = []): bool
    {
        return $type === ParcelInformation::class . '[]';
    }

    public function getSupportedTypes(?string $format): array
    {
        return ['object' => true];
    }
}
