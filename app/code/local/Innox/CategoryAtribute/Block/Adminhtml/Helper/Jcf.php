<?php
class Innox_CategoryAtribute_Block_Adminhtml_Helper_Jcf extends Varien_Data_Form_Element_Textarea
{
    public function getElementHtml()
    {
        $this->addClass('textarea');
		$this->addClass('jcf-output');
		
		// get default value
		$pageType = strpos(Mage::helper('core/url')->getCurrentUrl(),"catalog_product/edit/") !== FALSE ? "catalog_product" : "catalog_category";
		$attributeValue = Mage::getModel('eav/entity_attribute')->loadByCode($pageType, $this->getId())->getData("default_value");
		
		
		$html = "<div id=\"jcf-container\">
		  <div id=\"table\">
			<div class=\"row\">
			  <div id=\"data\">
				<input type=\"text\" class=\"flex\" name=\"multi[0][0]\">
			  </div>
			  <div id=\"columns\">
				<span id=\"add-column\">+</span><span id=\"remove-column\">-</span>
			  </div>
			</div>
		  </div>
		  <div id=\"controls\">
			<span id=\"add-row\">Add Row</span><span id=\"save-content\">Save</span><span id=\"load-content\">Load</span>
		  </div>";		
        $html .= '<textarea id="'.$this->getHtmlId().'" name="'.$this->getName().'" '.$this->serialize($this->getHtmlAttributes()).' >';
//		$html .= implode(", ",get_class_methods($this));
        $html .= $this->getEscapedValue() ? $this->getEscapedValue() : $attributeValue;
        $html .= "</textarea>";
		//$html .= "<span class=\"jcf-loader\">".."</span></div>";
        $html .= $this->getAfterElementHtml();
		$html .= '<script>if(window.jcfLoad) { setTimeout(function() {
			jcfLoad("'.$this->getHtmlId().'");
		},0e3); } </script>';
		
        return $html;
    }
}