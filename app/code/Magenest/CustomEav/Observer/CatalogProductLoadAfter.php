<?php
namespace Magenest\CustomEav\Observer;

use Magento\Catalog\Model\Product;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class CatalogProductLoadAfter implements ObserverInterface{

    /**
     * @inheritDoc
     */
    public function execute(Observer $observer)
    {
        /** @var Product $product */
        $product = $observer->getData('data_object');
        $oldValue = $product->getData('dump_text');
        $oldValueLength = strlen($oldValue);
        $product->addData(['dump_text'=>$oldValue." varchar ($oldValueLength)"]);
    }
}