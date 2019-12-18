<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magenest\Clock\Model\Config\Source\Clock;

/**
 * @api
 * @since 100.0.2
 */
class Size implements \Magento\Framework\Option\ArrayInterface
{
    /**
     * Options getter
     *
     * @return array
     */
    public function toOptionArray()
    {
        return [
            ['value' => 0, 'label' => __('Small')],
            ['value' => 1, 'label' => __('Medium')],
            ['value' => 2, 'label' => __('Large')]
        ];
    }

    /**
     * Get options in "key-value" format
     *
     * @return array
     */
    public function toArray()
    {
        return [0 => __('Small'), 1 => __('Medium'),2=>__('Large')];
    }
}
