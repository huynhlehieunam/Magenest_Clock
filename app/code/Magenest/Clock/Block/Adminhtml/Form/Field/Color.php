<?php

namespace Magenest\Clock\Block\Adminhtml\Form\Field;

<<<<<<< HEAD
=======
use Magento\Backend\Block\Template\Context;
>>>>>>> a9690f9586fe0c932caf0c91064efca7d43d6385
use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class Color extends Field
{
    private $html;

<<<<<<< HEAD
=======
    public function __construct(Context $context, array $data = [])
    {
        parent::__construct($context, $data);
    }

>>>>>>> a9690f9586fe0c932caf0c91064efca7d43d6385
    /**
     * @param AbstractElement $element
     * @return string
     */
    protected function _getElementHtml(AbstractElement $element)
    {
<<<<<<< HEAD
        return '<a>Hello</a>';
=======
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

>>>>>>> a9690f9586fe0c932caf0c91064efca7d43d6385
    }
}
