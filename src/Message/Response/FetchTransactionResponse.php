<?php

namespace Omnipay\Luminor\Message\Response;

use Omnipay\Luminor\Exception\JsonException;
use Omnipay\Luminor\Message\AbstractResponse;

/**
 * Class RetrieveObjectResponse
 * @package Omnipay\Luminor\Message\Response
 */
class FetchTransactionResponse extends AbstractResponse
{
    /**
     * @var string
     */
    private const STATUS_PAID = 'paid';

    /**
     * @inheritDoc
     * @throws JsonException
     */
    public function isSuccessful(): bool
    {
        return $this->isStatusCodeOk() && $this->isStatusPaid();
    }

    /**
     * @return bool
     * @throws JsonException
     */
    private function isStatusPaid(): bool
    {
        return $this->getValueFromData('status') === self::STATUS_PAID;
    }

    /**
     * @return string
     * @throws JsonException
     */
    public function getLanguage(): string
    {
        return $this->getValueFromData('purchase.language');
    }
}
