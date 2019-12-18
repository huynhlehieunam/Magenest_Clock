<?php
namespace Magenest\Clock\Model\Config\Source;

use Magento\Customer\Model\ResourceModel\Group\Collection;
use Magento\Customer\Model\ResourceModel\Group\CollectionFactory;

/**
 * @api
 * @since 100.0.2
 */
class CustomerGroup implements \Magento\Framework\Option\ArrayInterface
{

    private $customerGroupCollectionFactory;

    public function __construct(CollectionFactory $customerGroupCollectionFactory)
    {
        $this->customerGroupCollectionFactory = $customerGroupCollectionFactory;
    }

    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        /** @var Collection $customerGroupCollection */
        $customerGroupCollection = $this->customerGroupCollectionFactory->create();

        return $customerGroupCollection->toOptionArray();
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        /** @var Collection $customerGroupCollection */
        $customerGroupCollection = $this->customerGroupCollectionFactory->create();

        return $customerGroupCollection->toArray();
    }
}
