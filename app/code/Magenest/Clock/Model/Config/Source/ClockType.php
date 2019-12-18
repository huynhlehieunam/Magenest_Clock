<?php
namespace Magenest\Clock\Model\Config\Source;

/**
 * @api
 * @since 100.0.2
 */
class ClockType implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => 1, 'label' => __('Type 1')],
            ['value' => 2, 'label' => __('Type 2')],
            ['value' => 3, 'label' => __('Type 3')]
        ];
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return [ 1 => __('Type 1'), 2 => __('Type 2'), 3 => __('Type 3')];
    }
}
