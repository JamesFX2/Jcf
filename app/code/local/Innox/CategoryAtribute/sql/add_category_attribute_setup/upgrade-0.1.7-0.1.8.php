<?php
$installer = $this;

$installer->startSetup();
$entityTypeId = 'catalog_category';

$installer->addAttribute($entityTypeId, 'ec_top_bgcolor', array(
    'group'				=> 'Colours',
    'label'				=> 'Top Background',
    'note'				=> "Pick the colour of background in the top container",
    'type'				=> 'varchar',
    'input'				=> 'text',
    'input_renderer'     => 'categoryatribute/adminhtml_helper_color',
    'visible'			=> true,
    'required'			=> false,
    'searchable'		=> false,
    'filterable'		=> false,
    'comparable'		=> false,
    'user_defined'		=> true,
    'visible_on_front'	=> true,
    'global'			=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));

$installer->addAttribute($entityTypeId, 'ec_box_bgcolor', array(
    'group'				=> 'Colours',
    'label'				=> 'Box Background',
    'note'				=> "Background for some boxes excluding top container",
    'type'				=> 'varchar',
    'input'				=> 'text',
    'input_renderer'     => 'categoryatribute/adminhtml_helper_color',
    'visible'			=> true,
    'required'			=> false,
    'searchable'		=> false,
    'filterable'		=> false,
    'comparable'		=> false,
    'user_defined'		=> true,
    'visible_on_front'	=> true,
    'global'			=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));

$installer->addAttribute($entityTypeId, 'ec_cta_color', array(
    'group'				=> 'Colours',
    'label'				=> 'CTA Text',
    'note'				=> "Pick the colour of text in CTA boxes",
    'type'				=> 'varchar',
    'input'				=> 'text',
    'input_renderer'     => 'categoryatribute/adminhtml_helper_color',
    'visible'			=> true,
    'required'			=> false,
    'searchable'		=> false,
    'filterable'		=> false,
    'comparable'		=> false,
    'user_defined'		=> true,
    'visible_on_front'	=> true,
    'global'			=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));



$installer->addAttribute($entityTypeId, 'ec_links_heading', array(
    'group'				=> 'Repeatable Boxes',
    'label'				=> 'Box Heading',
    'note'				=> "Heading for repeatable boxes",
    'type'				=> 'varchar',
    'input'				=> 'text',
    'visible'			=> true,
    'required'			=> false,
    'searchable'		=> false,
    'filterable'		=> false,
    'comparable'		=> false,
    'user_defined'		=> true,
    'visible_on_front'	=> true,
    'global'			=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));



$installer->addAttribute($entityTypeId, 'ec_hide_products', array(
    'group'         => 'Product Listing',
    'input' => 'select',
    'type' => 'int',
	'default' => 0,
    'source' => 'eav/entity_attribute_source_boolean',
    'note'		    => "Hide normal product listing block.",	
    'label'         => 'Hide products',
    'backend'       => '',
    'filterable'	=> false,
    'comparable'	=> false,
    'user_defined'	=> true,
    'visible'       => true,
    'required'      => false,
    'visible_on_front' => true,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE
));


$installer->addAttribute($entityTypeId, 'ec_slider_title', array(
    'group'				=> 'Product Slider',
    'label'				=> 'Slider Heading',
    'note'				=> "Heading for slider",
    'type'				=> 'varchar',
    'input'				=> 'text',
    'visible'			=> true,
    'required'			=> false,
    'searchable'		=> false,
    'filterable'		=> false,
    'comparable'		=> false,
    'user_defined'		=> true,
    'visible_on_front'	=> true,
    'global'			=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));


$installer->addAttribute($entityTypeId, 'ec_two_column', array(
    'group'				=> 'Two Column Boxes',
    'label'				=> 'Repeater Two Column Boxes',
    'note'				=> "HTML supported",
	'input_renderer' => 'categoryatribute/adminhtml_helper_rbt',
	'default' 			=> '{"controls":{"locked":true,"maxrows":30,"fields":["title","box colour","heading left","content left","heading right","content right"]},"data":[]}',
    'type'				=> 'text',
    'input'				=> 'textarea',
    'visible'			=> true,
    'required'			=> false,
    'searchable'		=> false,
    'filterable'		=> false,
    'comparable'		=> false,
    'user_defined'		=> true,
    'visible_on_front'	=> true,
    'global'			=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));

$installer->addAttribute($entityTypeId, 'ec_faqboxes', array(
    'group'				=> 'FAQ Boxes',
    'label'				=> 'Repeater FAQ Boxes',
    'note'				=> "HTML supported. Link is optional",
	'input_renderer' => 'categoryatribute/adminhtml_helper_rbt',
	'default' 			=> '{"controls":{"locked":true,"maxrows":30,"fields":["question","answer content", "answer link"]},"data":[]}',
    'type'				=> 'text',
    'input'				=> 'textarea',
    'visible'			=> true,
    'required'			=> false,
    'searchable'		=> false,
    'filterable'		=> false,
    'comparable'		=> false,
    'user_defined'		=> true,
    'visible_on_front'	=> true,
    'global'			=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));

$installer->addAttribute($entityTypeId, 'ec_footer_bgimage', array(
    'group'				=> 'Footer Fancy Box',
    'label'				=> 'Background image',
    'note'				=> "If no image is uploaded, defaults to background colour",
    'type'				=> 'varchar',
    'input'				=> 'image',
    'visible'			=> true,
    'required'			=> false,
    'backend'       => 'catalog/category_attribute_backend_image',
    'frontend'			=> '',
    'searchable'		=> false,
    'filterable'		=> false,
    'comparable'		=> false,
    'user_defined'		=> true,
    'visible_on_front'	=> true,
    'global'			=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));

$installer->addAttribute($entityTypeId, 'ec_footer_width',  array(
    'group'				=> 'Footer Fancy Box',
    'label'				=> 'Footer Text Width',
    'note'				=> "On Desktop, whether the text is full width or not",
    'type'				=> 'int',
    'input'				=> 'select',
    'visible'			=> true,
    'required'			=> false,
    'backend'       => 'eav/entity_attribute_backend_array',
    'frontend'			=> '',
    'searchable'		=> false,
    'filterable'		=> false,
    'comparable'		=> false,
	'option'     => [
			'values' => [
				0 => '100%',
				1 => '66%',
				2 => '33%',
			]
    ],
    'user_defined'		=> true,
    'visible_on_front'	=> true,
    'global'			=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));

$installer->addAttribute($entityTypeId, 'ec_footer_position',  array(
    'group'				=> 'Footer Fancy Box',
    'label'				=> 'Footer Text Position',
    'note'				=> "On Desktop, position of the text block",
    'type'				=> 'int',
    'input'				=> 'select',
    'visible'			=> true,
    'required'			=> false,
    'backend'       => 'eav/entity_attribute_backend_array',
    'frontend'			=> '',
    'searchable'		=> false,
    'filterable'		=> false,
    'comparable'		=> false,
	'option'     => [
			'values' => [
				0 => 'left',
				1 => 'center',
				2 => 'right',
			]
    ],
    'user_defined'		=> true,
    'visible_on_front'	=> true,
    'global'			=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));


