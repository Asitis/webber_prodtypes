<?php

namespace Webber\ProductType\Setup;

use Magento\Catalog\Model\Product;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Webber\ProductType\Model\Product\Type\Binnenwerk;
use Webber\ProductType\Model\Product\Type\Rekeningmap;
use Webber\ProductType\Model\Product\Type\Menumap;

class InstallData implements InstallDataInterface
{
    protected $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        /** @var \Magento\Eav\Setup\EavSetup $eavSetup */
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);

        // price attributes we want to apply
        // to our product type
        $attributes = [
            'price',
            'special_price',
            'special_from_date',
            'special_to_date',
            'minimal_price',
            'tax_class_id'
        ];

        foreach ($attributes as $attributeCode) {
            $relatedProductTypes = explode(
                ',',
                $eavSetup->getAttribute(Product::ENTITY, $attributeCode, 'apply_to')
            );
            if (!in_array(Binnenwerk::TYPE_CODE, $relatedProductTypes)) {
                $relatedProductTypes[] = Binnenwerk::TYPE_CODE;
                $eavSetup->updateAttribute(
                    Product::ENTITY,
                    $attributeCode,
                    'apply_to',
                    join(',', $relatedProductTypes)
                );
            }
            if (!in_array(Menumap::TYPE_CODE, $relatedProductTypes)) {
                $relatedProductTypes[] = Menumap::TYPE_CODE;
                $eavSetup->updateAttribute(
                    Product::ENTITY,
                    $attributeCode,
                    'apply_to',
                    join(',', $relatedProductTypes)
                );
            }
            if (!in_array(Rekeningmap::TYPE_CODE, $relatedProductTypes)) {
                $relatedProductTypes[] = Rekeningmap::TYPE_CODE;
                $eavSetup->updateAttribute(
                    Product::ENTITY,
                    $attributeCode,
                    'apply_to',
                    join(',', $relatedProductTypes)
                );
            }
        }
    }
}