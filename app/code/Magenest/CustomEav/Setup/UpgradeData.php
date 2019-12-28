<?php

namespace Magenest\CustomEav\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataInterface{

    /**
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * @inheritDoc
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        if(version_compare($context->getVersion(),'1.1.0','<')){
            $this->addSelectAttribute($eavSetup);
        }
        if(version_compare($context->getVersion(),'1.1.1','<')){
            $this->addVarcharAttribute($eavSetup);
        }
        if(version_compare($context->getVersion(),'1.1.2','<')){
            $this->applyPriceToNewProductType($eavSetup);
        }
    }

    private function addSelectAttribute($eavSetup)
    {
        /** @var EavSetup $eavSetup */
        try {
            $eavSetup->addAttribute(
                \Magento\Catalog\Model\Product::ENTITY,
                'customer_group',
                [
                    'type' => 'text',
                    'backend' => '',
                    'frontend' => '',
                    'label' => 'Customer Group',
                    'input' => 'select',
                    'class' => '',
                    'source' => '\Magento\Customer\Model\Customer\Attribute\Source\Group',
                    'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible' => true,
                    'required' => false,
                    'user_defined' => false,
                    'default' => '',
                    'searchable' => false,
                    'filterable' => false,
                    'comparable' => false,
                    'visible_on_front' => false,
                    'used_in_product_listing' => true,
                    'unique' => false,
                    'apply_to' => '',
                    'is_used_in_grid'       => true,
                    'is_visible_in_grid'    => true,
                ]
            );
        } catch (LocalizedException $e) {
            echo $e->getMessage();
        } catch (\Zend_Validate_Exception $e) {
            echo $e->getMessage();
        }
    }

    private function addVarcharAttribute($eavSetup)
    {
        /** @var EavSetup $eavSetup */
        try {
            $eavSetup->addAttribute(
                \Magento\Catalog\Model\Product::ENTITY,
                'dump_text',
                [
                    'type' => 'varchar',
                    'backend' => '',
                    'frontend' => '',
                    'label' => 'Dump Text',
                    'input' => 'text',
                    'class' => '',
                    'source' => '',
                    'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
                    'visible' => true,
                    'required' => false,
                    'user_defined' => false,
                    'default' => '',
                    'searchable' => false,
                    'filterable' => false,
                    'comparable' => false,
                    'visible_on_front' => false,
                    'used_in_product_listing' => true,
                    'unique' => false,
                    'apply_to' => '',
                    'is_used_in_grid'       => true,
                    'is_visible_in_grid'    => true,
                ]
            );
        } catch (LocalizedException $e) {
            echo $e->getMessage();
        } catch (\Zend_Validate_Exception $e) {
            echo $e->getMessage();
        }
    }

    private function applyPriceToNewProductType($eavSetup)
    {
        $fieldList = [
            'price',
            'special_price',
            'special_from_date',
            'special_to_date',
            'minimal_price',
            'cost',
            'tier_price',
        ];

        // make these attributes applicable to virtual products
        foreach ($fieldList as $field) {
            $applyTo = explode(
                ',',
                $eavSetup->getAttribute(\Magento\Catalog\Model\Product::ENTITY, $field, 'apply_to')
            );
            if (!in_array('custom_virtual', $applyTo)) {
                $applyTo[] = 'custom_virtual';
                $eavSetup->updateAttribute(
                    \Magento\Catalog\Model\Product::ENTITY,
                    $field,
                    'apply_to',
                    implode(',', $applyTo)
                );
            }
        }
    }
}