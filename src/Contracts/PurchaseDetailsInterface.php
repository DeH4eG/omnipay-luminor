<?php

namespace Omnipay\Luminor\Contracts;

use Omnipay\Luminor\Contracts\Helper\ArrayableInterface;

/**
 * Interface PurchaseDetailsInterface
 * @package Omnipay\Luminor\Contracts
 */
interface PurchaseDetailsInterface extends ArrayableInterface
{
    /**
     * @param array|ProductBagInterface $products
     * @return mixed
     */
    public function setProducts($products);

    /**
     * @param string $language
     * @return mixed
     */
    public function setLanguage(string $language);

    /**
     * @param string $currency
     * @return mixed
     */
    public function setCurrency(string $currency);
}