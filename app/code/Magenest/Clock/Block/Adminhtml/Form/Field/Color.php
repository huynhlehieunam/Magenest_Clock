<?php

namespace Magenest\Clock\Block\Adminhtml\Form\Field;


use Magento\Backend\Block\Template\Context;
use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class Color extends Field
{

    public function __construct(
        Context $context,
        array $data = [])
    {
        parent::__construct($context, $data);
    }

    /**
     * @param AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
        $inputHtml = $this->renderInput($element);

        return $inputHtml;
    }

    private function renderInput(AbstractElement $element)
    {
        $inputId = $element->getId();
        $name = $element->getData('name');
        $value = $element->getData('value');
        return <<<HTML
    <input type="color" id="$inputId" name="$name" value="$value">
HTML;
    }
}
