<?php

namespace Magenest\CustomEav\Observer;

use Magento\Catalog\Model\Product;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class UpdateValueDumpText implements ObserverInterface{

    /**
     * @inheritDocF
     */
    public function execute(Observer $observer)
    {
        /** @var Product $product */
        $product = $observer->getData('object');
        $dumpText = $product->getData('dump_text');
        $product->addData(['dump_text' => $dumpText."varchar"]);
    }
}