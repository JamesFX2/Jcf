<?php
class Innox_CategoryAtribute_Block_Adminhtml_Helper_Rbt extends Varien_Data_Form_Element_Textarea
{
    public function getElementHtml()
    {
        $this->addClass('textarea');
		$this->addClass('rbt-output');
		
		// get default value
		$pageType = strpos(Mage::helper('core/url')->getCurrentUrl(),"catalog_product/edit/") !== FALSE ? "catalog_product" : "catalog_category";
		$attributeValue = Mage::getModel('eav/entity_attribute')->loadByCode($pageType, $this->getId())->getData("default_value");
		
		
		$html = "<div id=\"rbt-container\">
		  <div id=\"table\" class=\"block\">
			<div class=\"row\">
			  <div id=\"data\">
				<textarea class=\"flex\" name=\"multi[0][0]\"></textarea>
			  </div>
			</div>
		  </div>
		  <div id=\"controls\">
			<span id=\"remove-box\">Remove Box</span> <span id=\"add-box\">Add Box</span> <span id=\"load-content\">Load</span>
		  </div>";		
        $html .= '<textarea id="'.$this->getHtmlId().'" name="'.$this->getName().'" '.$this->serialize($this->getHtmlAttributes()).' >';
        $html .= $this->getEscapedValue() ? $this->getEscapedValue() : $attributeValue;
        $html .= "</textarea>";
        $html .= $this->getAfterElementHtml();
		$html .= '<script>if(window.rbtLoad) { setTimeout(function() {
			rbtLoad("'.$this->getHtmlId().'");
		},0e3); } </script>';
		
        return $html;
    }
}