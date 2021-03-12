<?php

namespace Omnipay\Luminor\Traits;

/**
 * Trait ApiCredentialsTrait
 * @package Omnipay\Luminor\Traits
 */
trait ApiCredentialsTrait
{
    /**
     * @var string
     */
    public static $brandIdParameterKey = 'brand_id';

    /**
     * @var string
     */
    public static $secretKeyParameterKey = 'secretKey';

    /**
     * @param string $brandId
     * @return mixed
     */
    public function setBrandId(string $brandId)
    {
        return $this->setParameter(self::$brandIdParameterKey, $brandId);
    }

    /**
     * @param string $secretKey
     * @return mixed
     */
    public function setSecretKey(string $secretKey)
    {
        return $this->setParameter(self::$secretKeyParameterKey, $secretKey);
    }

    /**
     * @return string
     */
    public function getBrandId(): string
    {
        return $this->getParameter(self::$brandIdParameterKey);
    }

    /**
     * @return string
     */
    public function getSecretKey(): string
    {
        return $this->getParameter(self::$secretKeyParameterKey);
    }
}
