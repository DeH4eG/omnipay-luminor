# Omnipay: Luminor Gateway

Omnipay Luminor Gateway is a payment processing library for PHP. It's based on [Omnipay package](https://github.com/thephpleague/omnipay)

[![Latest Stable Version](https://poser.pugx.org/deh4eg/omnipay-luminor/v)](//packagist.org/packages/deh4eg/omnipay-luminor) [![Total Downloads](https://poser.pugx.org/deh4eg/omnipay-luminor/downloads)](//packagist.org/packages/deh4eg/omnipay-luminor) [![Latest Unstable Version](https://poser.pugx.org/deh4eg/omnipay-luminor/v/unstable)](//packagist.org/packages/deh4eg/omnipay-luminor) [![License](https://poser.pugx.org/deh4eg/omnipay-luminor/license)](//packagist.org/packages/deh4eg/omnipay-luminor)

## Installation

Omnipay is installed via [Composer](https://getcomposer.org/). To install, simply require `league/omnipay` and `deh4eg/omnipay-luminor` with Composer:

`composer require league/omnipay deh4eg/omnipay-luminor`

## API docs

Luminor Gateway API documentation you can find [here](https://gate.luminorgroup.com/api/)

## Usage

For general usage instructions, please see the main [Omnipay](https://github.com/thephpleague/omnipay) repository.

Currently, library implements 2 endpoints:
1. [Create a Purchase](#1-create-a-purchase)
2. [Retrieve an object by id](#2-retrieve-an-object-by-id)

## Code Examples

### 1. Create a Purchase

|Method|Endpoint|
|---|---|
|`POST`|`/purchases/`|

```php
use Omnipay\Luminor\Gateway;
use Omnipay\Luminor\Message\Response\PurchaseResponse;
use Omnipay\Omnipay;

/** @var Gateway $gateway */
$gateway = Omnipay::create(Gateway::getGatewayClass());

$gateway->setBrandId('123456789');
$gateway->setSecretKey('abcde123456');

$options = [
    'client' => [
        'email' => 'test@test.com'
    ],
    'purchase' => [
        'currency' => 'EUR', // Currency code in the ISO 4217 standard,
        'language' => 'lv', // Language code in the ISO 639-1 format
        'total_override' => 100, // (optional) [type: int] If set, will override total sum from products[],
        'products' => [
            [
                'name' => 'Product name',
                'price' => 100, // [type: int],
                'quantity' => 1
            ]
        ]
    ],
    'success_redirect' => 'https://www.example.com/success/',
    'failure_redirect' => 'https://www.example.com/failure/',
    'cancel_redirect' => 'https://www.example.com/cancel/' // (optional)
];

/** @var PurchaseResponse $response */
$response = $gateway->completePurchase($options)->send();

if ($response->isRedirect()) {
    $response->redirect();
}
```

### 2. Retrieve an object by id

|Method|Endpoint|
|---|---|
|`GET`|`/purchases/{id}/`|

```php
use Omnipay\Luminor\Gateway;
use Omnipay\Luminor\Message\Response\FetchTransactionResponse;
use Omnipay\Omnipay;

/** @var Gateway $gateway */
$gateway = Omnipay::create(Gateway::getGatewayClass());

$gateway->setBrandId('123456789');
$gateway->setSecretKey('abcde123456');

$options = [
    'transaction_reference' => 'abc123' // Object ID (UUID) from purchase response
];

/** @var FetchTransactionResponse $response */
$response = $gateway->fetchTransaction($options)->send();

if ($response->isSuccessful()) {
    // Do code
}
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.