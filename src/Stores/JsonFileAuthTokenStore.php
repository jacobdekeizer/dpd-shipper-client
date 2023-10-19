<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Stores;

use JacobDeKeizer\DpdShipper\Entities\Login\AuthData;
use JacobDeKeizer\DpdShipper\Exceptions\AuthStorageException;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Throwable;

class JsonFileAuthTokenStore implements AuthTokenStore
{
    private Serializer $serializer;

    public function __construct(private readonly string $path)
    {
        $this->serializer = new Serializer(
            normalizers: [
                new DateTimeNormalizer(),
                new ObjectNormalizer(),
            ],
            encoders: [
                new JsonEncoder(),
            ]
        );
    }

    public function store(AuthData $authData): void
    {
        try {
            file_put_contents($this->path, $this->serializer->serialize(data: $authData, format: 'json'));
        } catch (Throwable $throwable) {
            throw new AuthStorageException(
                message: 'Could not store auth data.',
                previous: $throwable
            );
        }
    }

    public function retrieve(): ?AuthData
    {
        $contents = file_get_contents($this->path, true);

        if ($contents === false) {
            return null;
        }

        try {
            return $this->serializer->deserialize($contents, AuthData::class, 'json');
        } catch (Throwable) {
            return null;
        }
    }
}
