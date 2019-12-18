<?php

namespace Magenest\Clock\Block\Adminhtml\Form\Field;

class ClockType extends \Magento\Framework\View\Element\Html\Select
{
    /**
     * @var \Magenest\Clock\Model\Config\Source\ClockType
     */
    private $_clockType;

    /**
     * Activation constructor.
     *
     * @param \Magento\Framework\View\Element\Context $context
     * @param \Magento\Config\Model\Config\Source\Enabledisable $enableDisable $enableDisable
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Context $context,
        \Magenest\Clock\Model\Config\Source\ClockType $clockType,
        array $data = []
    ) {
        parent::__construct($context, $data);

        $this->_clockType = $clockType;
    }

    /**
     * @param string $value
     * @return Magently\Tutorial\Block\Adminhtml\Form\Field\Activation
     */
    public function setInputName($value)
    {
        return $this->setName($value);
    }

    /**
     * Parse to html.
     *
     * @return mixed
     */
    public function _toHtml()
    {
        if (!$this->getOptions()) {
            $attributes = $this->_clockType->toOptionArray();

            foreach ($attributes as $attribute) {
                $this->addOption($attribute['value'], $attribute['label']);
            }
        }

        return parent::_toHtml();
    }
}