<?php

namespace Magenest\Clock\Block\Adminhtml\Form\Field;

class ClockTypeDinamicRow extends \Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray
{
    protected $_clockType;
    protected $_customerGroup;

    /**
     * Get activation options.
     *
     * @return \Magento\Framework\View\Element\BlockInterface
     */
    protected function _getClockTypeRenderer()
    {
        if (!$this->_clockType) {
            $this->_clockType = $this->getLayout()->createBlock(
                '\Magenest\Clock\Block\Adminhtml\Form\Field\ClockType',
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }

        return $this->_clockType;
    }

    /**
     * Get activation options.
     *
     * @return \Magento\Framework\View\Element\BlockInterface
     */
    protected function _getCustomerGroupRenderer()
    {
        if (!$this->_customerGroup) {
            $this->_customerGroup = $this->getLayout()->createBlock(
                '\Magenest\Clock\Block\Adminhtml\Form\Field\CustomerGroup',
                '',
                ['data' => ['is_render_to_js_template' => true]]
            );
        }

        return $this->_customerGroup;
    }

    /**
     * Prepare to render.
     *
     * @return void
     */
    protected function _prepareToRender()
    {
        $this->addColumn(
            'customer_group',
            [
                'label' => __('Customer Group'),
                'renderer' => $this->_getCustomerGroupRenderer()
            ]
        );
        $this->addColumn(
            'clock_type',
            [
                'label' => __('Clock Type'),
                'renderer' => $this->_getClockTypeRenderer()
            ]
        );

        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add');
    }

    /**
     * Prepare existing row data object.
     *
     * @param \Magento\Framework\DataObject $row
     * @return void
     */
    protected function _prepareArrayRow(\Magento\Framework\DataObject $row)
    {
        $options = [];
        $customAttribute = $row->getData('customer_group');

        $key = 'option_' . $this->_getCustomerGroupRenderer()->calcOptionHash($customAttribute);
        $options[$key] = 'selected="selected"';
        $row->setData('option_extra_attrs', $options);
    }
}