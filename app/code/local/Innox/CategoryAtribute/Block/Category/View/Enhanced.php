<?php
class Innox_CategoryAtribute_Block_Category_View_Enhanced extends Mage_Catalog_Block_Category_View
{	
/* 
	protected $_ecategory = null;
	
	public function getCurrentCategory()
    {
        if (!$this->hasData('current_category')) {
            $this->setData('current_category', Mage::registry('current_category'));
        }
        return $this->getData('current_category');
    }
	*/
	
	public function getBlock($field = null)
	{
		if(!$field)
		{
			return false;
		}
		
		if (!$this->hasData('current_category')) {
            $this->setData('current_category', Mage::registry('current_category'));
        }
		
		$value = $this->getData('current_category')->getData($field);
		
		if($value) {
			return $this->getLayout()->createBlock('cms/block')->setBlockId($value)->toHtml();
		}
		
		return false;
		
	}
		
	
	public function getRbt($field = null)
    {

        if(!$field)
		{
			return false;
		}
		
		if (!$this->hasData('current_category')) {
            $this->setData('current_category', Mage::registry('current_category'));
        }
		$output = array();
		$temp = array();
		$proc = $this->getData('current_category')->getData($field);
		if(strlen($proc) == 0)
		{
			return false;
		}
		$proc = json_decode($proc,true) && json_last_error() == JSON_ERROR_NONE ? json_decode($proc,true) : array();
		if(!array_key_exists("data", $proc) || count($proc["data"]) < 1 || !array_key_exists("v0", $proc["data"][0]))
		{
			return false;
		}
		$labels = array("default");
		if(array_key_exists("controls", $proc) && array_key_exists("fields", $proc["controls"]) && count($proc["controls"]["fields"]) > 1 && !array_key_exists("v1", $proc["data"][0]))
		{
			$labels = $proc["controls"]["fields"];
	
		}
		$j = 0;
		for($i = 0; $i < count($proc["data"]); $i++)
		{

			$temp[$labels[$j]] = array_key_exists("v0", $proc["data"][$i]) ? $proc["data"][$i]["v0"] : false;
			if(strpos($labels[$j],"content") !== FALSE)
			{
				$temp[$labels[$j]] = $temp[$labels[$j]] && strlen($temp[$labels[$j]]) > 0 && $temp[$labels[$j]] == strip_tags($temp[$labels[$j]]) ? "<p>".$temp[$labels[$j]]."</p>" : $temp[$labels[$j]];
			}
			$j++;
			if($j == count($labels))
			{
				$output[] = $temp;
				$temp = array();
				$j = 0;
				
			}
			
			
		}
		return $output;
		

    }
	
	public function getColour($field = null)
	{
        if(!$field)
		{
			return false;
		}
		if (!$this->hasData('current_category')) {
            $this->setData('current_category', Mage::registry('current_category'));
        }
		$proc = $this->getData('current_category')->getData($field);
		return $proc && strlen($proc) > 0 && substr($proc,0,1) !== "#" ? "#".$proc : "#fff";
		 
	}
	
	public function getJcf($field = null, $htmlify = false)
	{
		if(!$field)
		{
			return false;
		}
		
		if (!$this->hasData('current_category')) {
            $this->setData('current_category', Mage::registry('current_category'));
        }
		$output = array();
		$temp = array();
		$proc = $this->getData('current_category')->getData($field);
		if(strlen($proc) == 0)
		{
			return false;
		}
		$proc = json_decode($proc,true) && json_last_error() == JSON_ERROR_NONE ? json_decode($proc,true) : array();
		if(!array_key_exists("data", $proc) || count($proc["data"]) < 1 || !array_key_exists("v0", $proc["data"][0]))
		{
			return false;
		}
		$labels = array("default");
		if(array_key_exists("controls", $proc) && array_key_exists("fields", $proc["controls"]) && count($proc["controls"]["fields"]) > 1)
		{
			$labels = $proc["controls"]["fields"];
		}
		else return false;
		
		$j = 0;
		for($i = 0; $i < count($proc["data"]); $i++)
		{
			$output[$i] = array();
			foreach($proc["data"][$i] as $key => $value)
			{
				$ph =  $value && strlen($value) > 0 ? $value : false;
				$output[$i][$labels[(int) str_replace("v","",$key)]] = $ph && $htmlify && $ph == strip_tags($ph) ? "<p>".$ph."</p>" : $ph;
			}			
			
		}
		return $output;
		
	}
	


}
