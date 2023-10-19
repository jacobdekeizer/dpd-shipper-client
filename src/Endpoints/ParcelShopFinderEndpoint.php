<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Endpoints;

use JacobDeKeizer\DpdShipper\Entities\ParcelShopFinder\CitiesResponse;
use JacobDeKeizer\DpdShipper\Entities\ParcelShopFinder\FindCitiesRequest;
use JacobDeKeizer\DpdShipper\Entities\ParcelShopFinder\FindParcelShopsByGeoDataRequest;
use JacobDeKeizer\DpdShipper\Entities\ParcelShopFinder\FindParcelShopsRequest;
use JacobDeKeizer\DpdShipper\Entities\ParcelShopFinder\ParcelShopsResponse;
use JacobDeKeizer\DpdShipper\Exceptions\DpdShipperException;
use JacobDeKeizer\DpdShipper\Exceptions\AuthenticationFaultException;

class ParcelShopFinderEndpoint extends AbstractEndpoint
{
    /**
     * @throws DpdShipperException
     * @throws AuthenticationFaultException
     */
    public function findParcelShops(FindParcelShopsRequest $request): ParcelShopsResponse
    {
        return $this->doRequest(
            name: 'findParcelShops',
            data: $request,
            returnType: ParcelShopsResponse::class
        );
    }

    /**
     * @throws DpdShipperException
     * @throws AuthenticationFaultException
     */
    public function findParcelShopsByGeoData(FindParcelShopsByGeoDataRequest $request): ParcelShopsResponse
    {
        return $this->doRequest(
            name: 'findParcelShopsByGeoData',
            data: $request,
            returnType: ParcelShopsResponse::class
        );
    }

    protected function getWsdlPath(): string
    {
        return 'ParcelShopFinderServiceV50.wsdl';
    }
}
