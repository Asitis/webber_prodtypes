<?php
namespace Webber\ProductType\Model\Product\Type;

use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\Product\Type\AbstractType;

class Binnenwerk extends AbstractType
{
    const TYPE_CODE = 'binnenwerk';

    public function deleteTypeSpecificData(Product $product)
    {
    }
}