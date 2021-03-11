<?php

namespace Omnipay\Luminor\Common;

use Omnipay\Common\ItemBag;
use Omnipay\Luminor\Contracts\ProductBagInterface;
use Omnipay\Luminor\Contracts\ProductInterface;
use Omnipay\Luminor\Entity\ProductEntity;

/**
 * Class ProductBag
 * @package Omnipay\Luminor\Entity
 */
class ProductBag extends ItemBag implements ProductBagInterface
{
    /**
     * @param array|ProductInterface $item
     */
    public function add($item): void
    {
        if ($item instanceof ProductInterface) {
            $this->items[] = $item;
        } else {
            $this->items[] = new ProductEntity($item);
        }
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        $callback = static function (ProductInterface $product) {
            return $product->toArray();
        };

        return array_map($callback, $this->all());
    }
}