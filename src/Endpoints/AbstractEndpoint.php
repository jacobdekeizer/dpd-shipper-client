<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Endpoints;

use DateTime;
use JacobDeKeizer\DpdShipper\Client;
use JacobDeKeizer\DpdShipper\Denormalizers\ParcelInformationArrayNormalizer;
use JacobDeKeizer\DpdShipper\Entities\Error\AuthenticationFaultWrapper;
use JacobDeKeizer\DpdShipper\Entities\Login\LoginRequest;
use JacobDeKeizer\DpdShipper\Exceptions\AuthenticationFaultException;
use JacobDeKeizer\DpdShipper\Exceptions\DenormalizeResponseDataException;
use JacobDeKeizer\DpdShipper\Exceptions\DpdShipperException;
use JacobDeKeizer\DpdShipper\Exceptions\NormalizeRequestDataException;
use JacobDeKeizer\DpdShipper\Exceptions\SoapFaultException;
use SoapClient;
use SoapFault;
use SoapHeader;
use stdClass;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\BackedEnumNormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Throwable;

abstract class AbstractEndpoint
{
    private Serializer $serializer;

    public function __construct(protected readonly Client $client)
    {
        $objectNormalizer = new ObjectNormalizer(
            propertyTypeExtractor: new PhpDocExtractor(),
        );

        $this->serializer = new Serializer(
            normalizers: [
                new ParcelInformationArrayNormalizer($objectNormalizer),
                new BackedEnumNormalizer(),
                new ArrayDenormalizer(),
                new DateTimeNormalizer(),
                $objectNormalizer,
            ]
        );
    }

    abstract protected function getWsdlPath(): string;

    /**
     * @param class-string<TReturnType> $returnType
     *
     * @return TReturnType
     *
     * @template TReturnType
     *
     * @throws AuthenticationFaultException
     * @throws DpdShipperException
     */
    protected function doRequest(string $name, mixed $data, string $returnType, bool $withAuthentication = true)
    {
        $urlConfiguration = $this->client->getUrlConfiguration();

        try {
            $baseUrl = $this->client->isStaging() ? $urlConfiguration->stagingUrl : $urlConfiguration->productionUrl;

            $wsdlUrl = $baseUrl . $this->getWsdlPath();

            $soapClient = new SoapClient($wsdlUrl);
        } catch (SoapFault $soapFault) {
            throw new SoapFaultException(
                message: 'Could not create the soap client, err: ' . $soapFault->getMessage(),
                previous: $soapFault,
            );
        }

        if ($withAuthentication) {
            $soapClient->__setSoapHeaders($this->getAuthenticationHeader());
        }

        try {
            $normalizedData = $data !== null
                ? $this->serializer->normalize(data: $data, format: 'array')
                : null;
        } catch (ExceptionInterface $exception) {
            throw new NormalizeRequestDataException(
                data: $data,
                message: sprintf(
                    'Could not normalize request data for wsdl: %s with endpoint name: %s. Err: %s',
                    $exception->getMessage(),
                    $wsdlUrl,
                    $name,
                ),
                previous: $exception
            );
        }

        try {
            $response = $soapClient->$name($normalizedData);
        } catch (SoapFault $soapFault) {
            throw $this->parseSoapFault($soapFault, $wsdlUrl, $name);
        }

        try {
            return $this->serializer->denormalize(
                data: $response,
                type: $returnType,
                format: 'stdClass',
            );
        } catch (Throwable $throwable) {
            throw new DenormalizeResponseDataException(
                data: $response,
                message: sprintf(
                    'Could not denormalize response object for wsdl: %s with endpoint name: %s. Err: %s',
                    $wsdlUrl,
                    $name,
                    $throwable->getMessage(),
                ),
                previous: $throwable
            );
        }
    }

    /**
     * @throws DpdShipperException
     * @throws AuthenticationFaultException
     */
    private function getAuthenticationHeader(): SoapHeader
    {
        $urlConfiguration = $this->client->getUrlConfiguration();

        $authData = $this->client->login()->session();

        return new SoapHeader(
            namespace: $urlConfiguration->authenticationUrl,
            name: 'authentication',
            data: [
                'delisId' => $authData->delisId,
                'authToken' => $authData->authToken,
                'messageLanguage' => $this->client->getLocale(),
            ],
        );
    }

    private function parseSoapFault(SoapFault $soapFault, string $wsdlUrl, string $name): DpdShipperException
    {
        $errorMessage = sprintf(
            'Received soap fault for wsdl: %s with endpoint name: %s. Err: %s',
            $wsdlUrl,
            $name,
            $soapFault->getMessage()
        );

        if ($soapFault->detail instanceof StdClass && isset($soapFault->detail->authenticationFault)) {
            try {
                /** @var AuthenticationFaultWrapper $error */
                $error = $this->serializer->denormalize(
                    data: $soapFault->detail,
                    type: AuthenticationFaultWrapper::class,
                    format: 'stdClass',
                );
            } catch (Throwable $throwable) {
                return new DenormalizeResponseDataException(
                    data: $soapFault->detail,
                    message: sprintf(
                        'Could not denormalize error response detail object for wsdl: %s with endpoint name: %s. '
                            . 'Err: %s',
                        $wsdlUrl,
                        $name,
                        $throwable->getMessage(),
                    ),
                    previous: $throwable
                );
            }

            return new AuthenticationFaultException(
                detail: $error,
                message: $errorMessage,
                previous: $soapFault,
            );
        }

        return new SoapFaultException(
            message: $errorMessage,
            previous: $soapFault,
        );
    }
}
