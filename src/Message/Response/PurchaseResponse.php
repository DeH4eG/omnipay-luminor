<?php

namespace Omnipay\Luminor\Message\Response;

use Omnipay\Common\Message\RedirectResponseInterface;
use Omnipay\Luminor\Exception\JsonException;
use Omnipay\Luminor\Message\AbstractResponse;

/**
 * Class PurchaseResponse
 * @package Omnipay\Luminor\Message\Response
 */
class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
    /**
     * @var string
     */
    private const STATUS_CODE_OK = 201;

    /**
     * @var string
     */
    protected const STATUS_CREATED = 'created';

    /**
     * @var string
     */
    private const CHECKOUT_URL_KEY = 'checkout_url';

    /**
     * @var string
     */
    private const STATUS_KEY = 'status';

    /**
     * @var string
     */
    private const OBJECT_IDENTIFIER = 'id';

    /**
     * @return bool
     * @throws JsonException
     * @throws JsonException
     * @throws JsonException
     */
    public function isRedirect(): bool
    {
        return $this->isSuccessful() && $this->getValueFromData(self::CHECKOUT_URL_KEY);
    }

    /**
     * @inheritDoc
     * @throws JsonException
     */
    public function isSuccessful(): bool
    {
        return $this->isStatusCodeOk() && $this->isStatusCreated();
    }

    /**
     * @return bool
     */
    protected function isStatusCodeOk(): bool
    {
        return $this->getStatusCode() === self::STATUS_CODE_OK;
    }

    /**
     * @return bool
     * @throws JsonException
     * @throws JsonException
     * @throws JsonException
     */
    private function isStatusCreated(): bool
    {
        return $this->getValueFromData(self::STATUS_KEY) === self::STATUS_CREATED;
    }

    /**
     * @return string|null
     * @throws JsonException
     * @throws JsonException
     * @throws JsonException
     */
    public function getRedirectUrl(): ?string
    {
        return $this->getValueFromData(self::CHECKOUT_URL_KEY);
    }

    /**
     * @return string|null
     * @throws JsonException
     * @throws JsonException
     * @throws JsonException
     */
    public function getTransactionReference(): ?string
    {
        return $this->getValueFromData(self::OBJECT_IDENTIFIER);
    }

    /**
     * @return array
     * @throws JsonException
     * @throws JsonException
     * @throws JsonException
     */
    public function getRedirectData(): array
    {
        return [
            self::CHECKOUT_URL_KEY => $this->getValueFromData(self::CHECKOUT_URL_KEY)
        ];
    }
}
