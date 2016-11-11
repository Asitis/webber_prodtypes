<?php
namespace Webber\ProductType\Model\Product\Type;

use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\Product\Type\AbstractType;

class Rekeningmap extends AbstractType
{
    const TYPE_CODE = 'rekeningmap';

    public function deleteTypeSpecificData(Product $product)
    {
    }
}