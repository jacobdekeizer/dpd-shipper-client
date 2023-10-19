<?php

declare(strict_types=1);

namespace JacobDeKeizer\DpdShipper\Endpoints;

use JacobDeKeizer\DpdShipper\Entities\Login\AuthData;
use JacobDeKeizer\DpdShipper\Entities\Login\LoginRequest;
use JacobDeKeizer\DpdShipper\Entities\Login\LoginResponse;
use JacobDeKeizer\DpdShipper\Exceptions\DpdShipperException;
use JacobDeKeizer\DpdShipper\Exceptions\EmptyAuthDataException;
use JacobDeKeizer\DpdShipper\Exceptions\AuthenticationFaultException;

class LoginEndpoint extends AbstractEndpoint
{
    /**
     * @throws DpdShipperException
     * @throws AuthenticationFaultException
     */
    public function getAuthData(LoginRequest $request): AuthData
    {
        $response = $this->doRequest(
            name: 'getAuth',
            data: $request,
            returnType: LoginResponse::class,
            withAuthentication: false,
        );

        if ($response->return === null) {
            throw new EmptyAuthDataException('The return field of the getAuth endpoint is null.');
        }

        return $response->return;
    }

    protected function getWsdlPath(): string
    {
        return 'LoginServiceV21.wsdl';
    }
}
