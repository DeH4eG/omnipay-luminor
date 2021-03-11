<?php

namespace Omnipay\Luminor\Message\Request;

use Omnipay\Common\Message\ResponseInterface;
use Omnipay\Luminor\Message\AbstractRequest;
use Omnipay\Luminor\Message\Response\FetchTransactionResponse;

/**
 * Class RetrieveObjectRequest
 * @package Omnipay\Luminor\Message\Request
 */
class FetchTransactionRequest extends AbstractRequest
{
    /**
     * @var string
     */
    private const ENDPOINT_METHOD = 'purchases/{id}';

    /**
     * @var string
     */
    protected $httpMethod = 'GET';

    /**
     * @inheritDoc
     */
    public function getEndpointMethod(): string
    {
        return str_replace('{id}', $this->getTransactionReference(), self::ENDPOINT_METHOD);
    }

    /**
     * @inheritDoc
     */
    protected function createResponse(string $bodyContents, array $headers, int $statusCode): ResponseInterface
    {
        return $this->response = new FetchTransactionResponse($this, $bodyContents, $headers, $statusCode);
    }
}
