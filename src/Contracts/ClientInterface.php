<?php

namespace Omnipay\Luminor\Contracts;

use Omnipay\Luminor\Contracts\Helper\ArrayableInterface;

/**
 * Interface ClientInterface
 * @package Omnipay\Luminor\Contracts
 */
interface ClientInterface extends ArrayableInterface
{
    /**
     * @param string $email
     * @return mixed
     */
    public function setEmail(string $email);

    /**
     * @return string
     */
    public function getEmail(): string;
}
