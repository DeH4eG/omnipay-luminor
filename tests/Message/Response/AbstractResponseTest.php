<?php

namespace Omnipay\Luminor\Test\Message\Response;

use Omnipay\Luminor\Exception\JsonException;
use Omnipay\Luminor\Message\AbstractResponse;
use PHPUnit\Framework\TestCase;

abstract class AbstractResponseTest extends TestCase
{
    protected const RESPONSE_CLASS_NAME = AbstractResponse::class;

    public function testWhenJsonExceptionThrown(): void
    {
        $purchaseResponseStub = $this->createMock(static::RESPONSE_CLASS_NAME);

        $purchaseResponseStub->method('isSuccessful')
            ->willThrowException(new JsonException);

        $this->expectException(JsonException::class);

        $purchaseResponseStub->isSuccessful();
    }
}