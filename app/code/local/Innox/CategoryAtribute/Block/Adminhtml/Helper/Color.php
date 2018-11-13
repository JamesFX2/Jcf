<?php
class Innox_CategoryAtribute_Block_Adminhtml_Helper_Color extends Varien_Data_Form_Element_Text
{
    public function getElementHtml() {
        $html = parent::getElementHtml();
        $html .= "<script type=\"text/javascript\">
            $('".$this->getHtmlId()."').color = new jscolor.color($('".$this->getHtmlId()."'));
        </script>";
        return $html;
    }
}