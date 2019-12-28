<?php
namespace Magenest\CustomEav\Model\Product;
use Magento\Catalog\Api\Data\ProductTierPriceExtensionFactory;
use Magento\Customer\Api\GroupManagementInterface;
use Magento\Framework\Pricing\PriceCurrencyInterface;

class Price extends \Magento\Catalog\Model\Product\Type\Price
{
    /**
     * Retrieve product final price
     *
     * @param integer $qty
     * @param \Magento\Catalog\Model\Product $product
     * @return float
     */
    public function getFinalPrice($qty, $product)
    {
        if ($qty === null && $product->getCalculatedFinalPrice() !== null) {
            return $product->getCalculatedFinalPrice();
        }

        $finalPrice = parent::getFinalPrice($qty, $product);

        /**
         * links prices are added to base product price only if they can be purchased separately
         */
        if ($product->getLinksPurchasedSeparately()) {
            if ($linksIds = $product->getCustomOption('downloadable_link_ids')) {
                $linkPrice = 0;
                $links = $product->getTypeInstance()->getLinks($product);
                foreach (explode(',', $linksIds->getValue()) as $linkId) {
                    if (isset($links[$linkId])) {
                        $linkPrice += $links[$linkId]->getPrice();
                    }
                }
                $finalPrice += $linkPrice;
            }
        }

        $product->setData('final_price', $finalPrice);
        return max(0, $product->getData('final_price'));
    }

}
