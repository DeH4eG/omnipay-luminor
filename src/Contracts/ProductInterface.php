<?php

namespace Omnipay\Luminor\Contracts;

use Omnipay\Luminor\Contracts\Helper\ArrayableInterface;

/**
 * Interface ProductInterface
 * @package Omnipay\Luminor\Contracts
 */
interface ProductInterface extends ArrayableInterface
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return int
     */
    public function getQuantity(): int;

    /**
     * @return int
     */
    public function getPrice(): int;

    /**
     * @param string $name
     */
    public function setName(string $name);

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity);

    /**
     * @param int $price
     */
    public function setPrice(int $price);
}