# DPD Shipper API client for PHP

An object-oriented PHP client for the [DPD Shipper API](https://integrations.dpd.nl/dpd-shipper/dpd-shipper-webservices/introduction-expectations/).

## Installation

You can install this package via composer:

```
composer require jacobdekeizer/dpd-shipper-client
```

## Usage

```php
$client = new \JacobDeKeizer\DpdShipper\Client(
    authTokenStore: new \JacobDeKeizer\DpdShipper\Stores\JsonFileAuthTokenStore(
        __DIR__ . '/auth.json'
    ), // Or your own implementation of the AuthTokenStore interface
    accountConfiguration: new \JacobDeKeizer\DpdShipper\Configuration\AccountConfiguration(
        username: 'username',
        depotNumber: 'depot number',
        password: 'password',
    ),
    locale: 'nl_NL', // optional
    staging: false, // optional
);
```

## Endpoints

> This readme shows basic usage of this package, for all available options see the class definitions and the api documentation.

### ParcelShopFinder

[Documentation](https://integrations.dpd.nl/dpd-shipper/dpd-shipper-webservices/parcelshopfinder-service/)

#### Find parcel shops

```php
$result = $client->parcelShopFinder()->findParcelShops(new \JacobDeKeizer\DpdShipper\Entities\ParcelShopFinder\FindParcelShopsRequest(
    country: 'NL',
    zipCode: '1012NX',
    city: 'Amsterdam',
    limit: 2
));
```

#### Find parcel shops by geo data

```php
$result = $client->parcelShopFinder()->findParcelShopsByGeoData(new \JacobDeKeizer\DpdShipper\Entities\ParcelShopFinder\FindParcelShopsByGeoDataRequest(
    latitude: 52.377956,
    longitude: 4.897070,
    limit: 2
));
```

### Shipment

[Documentation](https://integrations.dpd.nl/dpd-shipper/dpd-shipper-webservices/shipment-service-2/)

#### Store orders

```php
$result = $client->shipment()->storeOrders(new \JacobDeKeizer\DpdShipper\Entities\Shipment\StoreOrdersRequest(
        [
            new \JacobDeKeizer\DpdShipper\Entities\Shipment\Order(
                generalShipmentData: new \JacobDeKeizer\DpdShipper\Entities\Shipment\GeneralShipmentData(
                    sendingDepot: $this->client->login()->session()->depot,
                    product: \JacobDeKeizer\DpdShipper\Entities\Shipment\ShipmentProduct::CL,
                    sender: new \JacobDeKeizer\DpdShipper\Entities\Shipment\Address(
                        name1: 'Ikea',
                        street: 'Hullenbergweg',
                        country: 'NL',
                        zipCode: '1101BL',
                        city: 'Amsterdam',
                        houseNo: '2',
                        phone: '+31612345678',
                        email: 'johndoe@example.com',
                    ),
                    recipient: new \JacobDeKeizer\DpdShipper\Entities\Shipment\Address(
                        name1: 'John Doe',
                        street: 'Hullenbergweg',
                        country: 'NL',
                        zipCode: '1101BL',
                        city: 'Amsterdam',
                        name2: 'Company Name',
                        houseNo: '2',
                        phone: '+31612345678',
                        email: 'johndoe@example.com',
                    ),
                ),
                productAndServiceData: new \JacobDeKeizer\DpdShipper\Entities\Shipment\ProductAndServiceData(
                    orderType: \JacobDeKeizer\DpdShipper\Entities\Shipment\OrderType::Consignment,
                    saturdayDelivery: true,
                    predict: new \JacobDeKeizer\DpdShipper\Entities\Shipment\Notification(
                        channel: \JacobDeKeizer\DpdShipper\Entities\Shipment\NotificationChannel::Sms,
                        value: '+31612345678',
                        language: 'NL',
                    ),
                ),
                parcels: [
                    new \JacobDeKeizer\DpdShipper\Entities\Shipment\Parcel(
                        customerReferenceNumber1: 'TEST12345',
                        customerReferenceNumber2: 'A reference', // Optional
                        volume: 0100202030, // 10cm x 20cm x 30cm, optional
                        weight: 315, // 3,15 KG, optional
                    ),
                    new \JacobDeKeizer\DpdShipper\Entities\Shipment\Parcel(
                        customerReferenceNumber1: 'TEST12',
                    )
                ]
            )
        ],
        new \JacobDeKeizer\DpdShipper\Entities\Shipment\PrintOptions(
            printerLanguage: \JacobDeKeizer\DpdShipper\Entities\Shipment\PrinterLanguage::PDF,
            paperFormat: \JacobDeKeizer\DpdShipper\Entities\Shipment\PaperFormat::A6,
        )
    ));
```

## Exceptions

All exceptions extend from the DpdShipperException.
See the Exceptions folder for all possible exceptions if you want to catch them individually.

```php
try {
    $result = $client->parcelShopFinder()->findParcelShopsByGeoData(...);

    var_dump($result);
} catch (\JacobDeKeizer\DpdShipper\Exceptions\AuthenticationFaultException $authenticationFaultException) {
    // Catches the specific AuthenticationFaultException
    $errorMessage = $authenticationFaultException->detail->authenticationFault->errorMessage;
    
    var_dump($authenticationFaultException->detail);
} catch (\JacobDeKeizer\DpdShipper\Exceptions\DpdShipperException $exception) {
    // Catches the rest of the possible exceptions.
    var_dump($exception);
}
```