<?php
namespace Webber\ProductType\Model\Product\Type;

use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\Product\Type\AbstractType;

class Menumap extends AbstractType
{
    const TYPE_CODE = 'menumap';

    public function deleteTypeSpecificData(Product $product)
    {
    }
}