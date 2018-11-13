<?php
class Innox_CategoryAtribute_Helper_Data extends Mage_Core_Helper_Abstract
{
	
	public function colourCheck($htmlCode) {
		
		if(!$htmlCode || strlen($htmlCode) < 2 || strpos($htmlCode) )
			return false;
		
		$colour = $this->HTMLToRGB($htmlCode);
		$hsl = $this->RGBToHSL($colour);
		return $hsl->lightness > 180 ? "black" : "white";
		
		
	}

	public function HTMLToRGB($htmlCode)
	  {
		if($htmlCode[0] == '#')
		  $htmlCode = substr($htmlCode, 1);

		if (strlen($htmlCode) == 3)
		{
		  $htmlCode = $htmlCode[0] . $htmlCode[0] . $htmlCode[1] . $htmlCode[1] . $htmlCode[2] . $htmlCode[2];
		}

		$r = hexdec($htmlCode[0] . $htmlCode[1]);
		$g = hexdec($htmlCode[2] . $htmlCode[3]);
		$b = hexdec($htmlCode[4] . $htmlCode[5]);

		return $b + ($g << 0x8) + ($r << 0x10);
	  }

	public function RGBToHSL($RGB) {
		$r = 0xFF & ($RGB >> 0x10);
		$g = 0xFF & ($RGB >> 0x8);
		$b = 0xFF & $RGB;

		$r = ((float)$r) / 255.0;
		$g = ((float)$g) / 255.0;
		$b = ((float)$b) / 255.0;

		$maxC = max($r, $g, $b);
		$minC = min($r, $g, $b);

		$l = ($maxC + $minC) / 2.0;

		if($maxC == $minC)
		{
		  $s = 0;
		  $h = 0;
		}
		else
		{
		  if($l < .5)
		  {
			$s = ($maxC - $minC) / ($maxC + $minC);
		  }
		  else
		  {
			$s = ($maxC - $minC) / (2.0 - $maxC - $minC);
		  }
		  if($r == $maxC)
			$h = ($g - $b) / ($maxC - $minC);
		  if($g == $maxC)
			$h = 2.0 + ($b - $r) / ($maxC - $minC);
		  if($b == $maxC)
			$h = 4.0 + ($r - $g) / ($maxC - $minC);

		  $h = $h / 6.0; 
		}

		$h = (int)round(255.0 * $h);
		$s = (int)round(255.0 * $s);
		$l = (int)round(255.0 * $l);

		return (object) Array('hue' => $h, 'saturation' => $s, 'lightness' => $l);
	  }


	   public function enhancedGetCTA($data)
	   {
		   
			$_enhanced_category_top_cta = $data;
			$_enhanced_category_top_cta = strlen($_enhanced_category_top_cta) > 0 && json_decode($_enhanced_category_top_cta,TRUE) ? json_decode($_enhanced_category_top_cta,TRUE) : FALSE;
			$_enhanced_category_top_cta_link = "";
			$_enhanced_category_top_hidden = "";
			if($_enhanced_category_top_cta && array_key_exists("data", $_enhanced_category_top_cta) && count($_enhanced_category_top_cta["data"]) > 0)
			{
				if(strlen($_enhanced_category_top_cta["data"][0]["v0"]) > 0)
				{

					$_enhanced_category_top_cta_link = '<p class="ptxt2"><a class="custom-bg know_more" href="'.$_enhanced_category_top_cta["data"][0]["v0"].'">';
					if(strlen($_enhanced_category_top_cta["data"][0]["v1"]) > 0)
					{
						$_enhanced_category_top_cta_link .= $_enhanced_category_top_cta["data"][0]["v1"];
					}
					else $_enhanced_category_top_cta_link .= "Read More";

					$_enhanced_category_top_cta_link .= "</a></p>";
				}
				else if(strlen($_enhanced_category_top_cta["data"][0]["v1"]) > 0)
				{
					$_enhanced_category_top_cta_link = '<p class="ptxt2"><a id="cat_read_more" class="custom-bg know_more" href="#">Read More</a></p>';
					$_enhanced_category_top_hidden = "<div id=\"cat_more_content\" style=\"display:none\" class=\"innertxt\">".$_enhanced_category_top_cta["data"][0]["v1"]."</div>";
				}


			}
			return array("link" => $_enhanced_category_top_cta_link, "hidden" => $_enhanced_category_top_hidden);
		   
		   
	   }
	   
	   public function enhancedGetBoxes($data)
	   {
		   $_enhanced_category_links_box = $data;
		   $_enhanced_category_links_box = strlen($_enhanced_category_links_box) > 0 && json_decode($_enhanced_category_links_box,TRUE) ? json_decode($_enhanced_category_links_box,TRUE) : FALSE;
		   $_enhanced_category_links_box_html = "";
		   if($_enhanced_category_links_box && array_key_exists("data", $_enhanced_category_links_box) && count($_enhanced_category_links_box["data"]) > 0)
		   {
			   $_enhanced_category_links_box_html = '<div class="boxes">';
			   for($i=0; $i<count($_enhanced_category_links_box["data"]);$i++)
			   {
				   $_hclass = "";
				   $_content = "";
				   
				   if(strlen($_enhanced_category_links_box["data"][$i]["v0"]) < 1)
				   {
					   $_enhanced_category_links_box["data"][$i]["v0"] = "#";
				   }
				   if(strlen($_enhanced_category_links_box["data"][$i]["v1"]) < 1)
				   {
					   continue;
				   }
				   if(strlen($_enhanced_category_links_box["data"][$i]["v2"]) > 0)
				   {
					   $_hclass = "reduced";
					   $_content = "<p>".$_enhanced_category_links_box["data"][$i]["v2"]."</p>";
				   }
				   
				   
				   $_linkurl = $_enhanced_category_links_box["data"][$i]["v0"];
				   $_linktext = $_enhanced_category_links_box["data"][$i]["v1"];
				   
				   $_enhanced_category_links_box_html .= "<div class=\"custom-border box\">
					<div class=\"title\">
						<h3 class=\"custom-font {$_hclass}\">
						{$_linktext}
						</h3>
						{$_content}
					</div>
					<div class=\"link {$_hclass}\">
						<a class=\"custom-bg\" href=\"{$_linkurl}\">Click here ></a>
					</div>
				</div>";
				   
				   
			   }
			   $_enhanced_category_links_box_html .= '</div">';
			   
			
			   
		   }
		   
		return $_enhanced_category_links_box_html;   
		   
	   }
	   
	   public function enhancedGetSlider($data) {
		   
		$_enhanced_category_slider = explode(",",$data);
		$_enhanced_category_slider_html = "";
		if(count($_enhanced_category_slider) > 0)
		{
			$_enhanced_category_slider_html .= '<div class="introduction_products owl-carousel owl-theme">';
		
			foreach($_enhanced_category_slider as $ik => $iv) {
				$_product = Mage::getModel("catalog/product")->load($iv);
				
				if($_product->getData('has_options')) {
					$AddToCartURL = $_product->getProductUrl();
				} else {
					$AddToCartURL = Mage::getUrl('checkout/cart/add', array('product'=>$_product->getId(),'qty'=>1, 'form_key' => Mage::getSingleton('core/session')->getFormKey()));
				}
				
				$_enhanced_category_slider_html .= '<div class="productitem item"><div class="prdimg"><a href="'.$_product->getProductUrl().'"><img src="'.Mage::helper('catalog/image')->init($_product, 'image', $_product->getTransparentImage())->resize(300, 300).'" /></a></div><div class="prdname"><p>'.$_product->getName().'</p> <p class="mt25"> <a href="'.$AddToCartURL.'" class="buynow">Buy Now</a></p></div></div>';
				}
			$_enhanced_category_slider_html .= '</div>';
	
		}

		   
			return $_enhanced_category_slider_html;
	   }
	   
	  public function getFakeConfigurable($data,$id) {
	   
		   $fakeConfigurable =  strlen($data) > 0 && json_decode($data,TRUE) ? json_decode($data,TRUE) : FALSE;
		   $fakeConfigurableHTML = "";
		   if($fakeConfigurable && array_key_exists("data", $fakeConfigurable) && count($fakeConfigurable["data"]) > 0)
		   {
			   
			   $productArray = array();
			   $labelsArray = array();
			   
			   for($i=0; $i<count($fakeConfigurable["data"]);$i++)
			   {
			   
				   if(strlen($fakeConfigurable["data"][$i]["v0"]) < 1 || (int) $fakeConfigurable["data"][$i]["v0"] < 1)
				   {
					   continue;
				   }				   
				   $productArray[] =  (int) $fakeConfigurable["data"][$i]["v0"];
				   
				   if(strlen($fakeConfigurable["data"][$i]["v1"]) < 1)
				   {
					   $labelsArray[(int) $fakeConfigurable["data"][$i]["v0"]] = "Placeholder";
					   continue;
				   }
				   
				   $labelsArray[(int) $fakeConfigurable["data"][$i]["v0"]] = $fakeConfigurable["data"][$i]["v1"];
			   }
			   
			   
			   if(count($productArray) > 1)
			   {
				   
				   
				   $_productCollection = Mage::getModel('catalog/product')->getCollection()->addFieldToFilter('entity_id', array('in'=> $productArray))
							->addAttributeToSelect('*') // add all attributes - optional
                            ->addAttributeToFilter('status', 1) // enabled
                            ->addAttributeToFilter('visibility', 4)
							->setOrder('price', 'ASC');
					
					if(count($_productCollection) < 2)
					{
						return "";
					}
					$fakeConfigurableHTML = '<div class="qtyoption">';
					foreach($_productCollection as $_product)
					{
						
						$_product_link = "";
						$_product_label = "";
						$_product_current = "";
						$_product_status = $_product->getStockItem()->getIsInStock() == 1;
						$_product_id = $_product->getId();
						$_product_class = "notselectedqty";
						
						
						if($_product_id == $id || !$_product_status)
						{
							$_product_link = "javascript:void(0)";
							$_product_current = $_product_id == $id ? " <i class=\"fa fa-check\"></i>" : "";
							$_product_class = $_product_id == $id ? "selectedqty" : "notselectedqty oos";
														
						}
						else $_product_link = $_product->getUrlPath();
						
						if(array_key_exists($_product_id,$labelsArray) && $labelsArray[$_product_id] !== "Placeholder")
						{
							$_product_label = $this->stripTags($labelsArray[$_product_id], null, true);
						}
						else $_product_label = $this->stripTags($_product->getName(), null, true); 
						
						$fakeConfigurableHTML .= "\n\n\t<a style=\"display: inline-block\" title=\"{$_product_label} ";
						$fakeConfigurableHTML .= $_product_status ? "" : "is out of stock";
						$fakeConfigurableHTML .=  "\" class=\"{$_product_class}\" href=\"{$_product_link}\">{$_product_label}{$_product_current}</a>\n\n";
					}
					
					$fakeConfigurableHTML .= '</div>';
			   }
			   			   
		   }
		   
		   return $fakeConfigurableHTML;
		   

	   }

}