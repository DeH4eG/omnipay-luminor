<?php

namespace Omnipay\Luminor\Test\Message\Request;

use Omnipay\Common\Exception\InvalidRequestException;
use Omnipay\Luminor\Entity\ClientEntity;
use Omnipay\Luminor\Entity\PurchaseDetailsEntity;
use Omnipay\Luminor\Message\AbstractRequest;
use Omnipay\Luminor\Message\Request\PurchaseRequest;
use Omnipay\Luminor\Message\Response\PurchaseResponse;

class PurchaseRequestTest extends AbstractRequestTest
{
    private $request;

    public function testValidationFails(): void
    {
        $this->expectException(InvalidRequestException::class);

        $this->request->getData();
    }

    public function testValidationPasses(): AbstractRequest
    {
        $parameters = [
            'client' => $this->createClientEntityMock(),
            'purchase' => $this->createPurchaseEntityMock(),
            'success_redirect' => '',
            'failure_redirect' => ''
        ];

        $purchaseRequest = $this->request->initialize($parameters);
        $purchaseRequestData = $purchaseRequest->getData();

        self::assertArrayHasKey('client', $purchaseRequestData);
        self::assertArrayHasKey('purchase', $purchaseRequestData);
        self::assertArrayHasKey('success_redirect', $purchaseRequestData);
        self::assertArrayHasKey('success_redirect', $purchaseRequestData);
        self::assertContains('purchases', $purchaseRequest->getEndpointMethod());

        return $purchaseRequest;
    }

    /**
     * @depends testValidationPasses
     * @param PurchaseRequest $purchaseRequest
     */
    public function testHttpMethodIsPost(PurchaseRequest $purchaseRequest): void
    {
        self::assertEquals('POST', $purchaseRequest->getHttpMethod());
    }

    /**
     * @depends testValidationPasses
     * @param PurchaseRequest $purchaseRequest
     */
    public function testDataInstances(PurchaseRequest $purchaseRequest): void
    {
        self::assertInstanceOf(PurchaseResponse::class, $purchaseRequest->send());
        self::assertInstanceOf(ClientEntity::class, $purchaseRequest->getClient());
        self::assertInstanceOf(PurchaseDetailsEntity::class, $purchaseRequest->getPurchase());
    }

    protected function setUp(): void
    {
        $this->request = $this->makeRequest(PurchaseRequest::class);
    }
}
