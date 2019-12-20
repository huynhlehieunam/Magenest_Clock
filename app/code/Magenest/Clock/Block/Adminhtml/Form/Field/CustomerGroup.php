<?php

namespace Magenest\Clock\Block\Adminhtml\Form\Field;

class CustomerGroup extends \Magento\Framework\View\Element\Html\Select
{
    protected $_enableDisable;
    /**
     * @var \Magenest\Clock\Model\Config\Source\CustomerGroup
     */
    private $_customerGroup;

    /**
     * Activation constructor.
     *
     * @param \Magento\Framework\View\Element\Context $context
     * @param \Magento\Config\Model\Config\Source\Enabledisable $enableDisable $enableDisable
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Context $context,
        \Magenest\Clock\Model\Config\Source\CustomerGroup $customerGroup,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_customerGroup = $customerGroup;
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
        if ($this->getData('is_disabled')===true){
            $this->setExtraParams("disabled");
        }
        if (!$this->getOptions()) {
            $attributes = $this->_customerGroup->toOptionArray();

            foreach ($attributes as $attribute) {
                $this->addOption($attribute['value'], $attribute['label']);
            }
        }

        return parent::_toHtml();
    }
}