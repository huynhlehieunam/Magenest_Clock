<?php
namespace Magenest\Clock\Block\Frontend;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Template;

class Clock extends Template{
    public function __construct(Template\Context $context, array $data = [])
    {
        parent::__construct($context, $data);
    }
    public function getBackgroundColor(){
        $backgroundColor = $this->_scopeConfig->getValue('clock_configuration/general/color');
        if (!$backgroundColor){
            $backgroundColor = '#fff';
        }
        return $backgroundColor;
    }

    public function getTextColor(){
        $textColor = $this->_scopeConfig->getValue('clock_configuration/general/text_color');
        if (!$textColor){
            $textColor = '#000';
        }
        return $textColor;
    }
}