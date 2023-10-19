<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Endpoints;

use JacobDeKeizer\DpdShipper\Entities\Shipment\StoreOrdersRequest;
use JacobDeKeizer\DpdShipper\Entities\Shipment\StoreOrdersResponse;
use JacobDeKeizer\DpdShipper\Exceptions\AuthenticationFaultException;
use JacobDeKeizer\DpdShipper\Exceptions\DpdShipperException;

class ShipmentEndpoint extends AbstractEndpoint
{
    /**
     * @throws DpdShipperException
     * @throws AuthenticationFaultException
     */
    public function storeOrders(StoreOrdersRequest $request): StoreOrdersResponse
    {
        return $this->doRequest(
            name: 'storeOrders',
            data: $request,
            returnType: StoreOrdersResponse::class,
        );
    }

    protected function getWsdlPath(): string
    {
        return 'ShipmentServiceV33.wsdl';
    }
}
