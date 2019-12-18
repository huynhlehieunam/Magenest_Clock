<?php

namespace Magenest\Clock\Block\Adminhtml\Form\Field;

use Magento\Backend\Block\Template\Context;
use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class Color extends Field
{
    private $html;

    public function __construct(Context $context, array $data = [])
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
        return <<<HTML
    <input type="text" id="$inputId">
    <script>
        var $inputId = document.getElementById("$inputId");
        
        $inputId.addEventListener('keydown',function(e) {
          console.log(e.target.value)
        })
    </script>
HTML;

    }
}
