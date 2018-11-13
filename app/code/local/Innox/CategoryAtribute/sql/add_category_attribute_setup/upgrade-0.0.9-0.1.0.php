<?php 

$installer = $this;
$installer->startSetup();
$entityTypeId = 'catalog_category';



$installer->addAttribute($entityTypeId, 'enhanced_category_heading', array(
    'group'				=> 'Enhanced Category',
    'label'				=> 'Top Heading',
    'note'				=> "Heading for page, overrides the category name",
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

$installer->addAttribute($entityTypeId, 'enhanced_category_top_content', array(
    'group'				=> 'Enhanced Category',
    'label'				=> 'Top Content Editor',
    'note'				=> "Content under heading, overrides description",
    'type'				=> 'text',
    'input'				=> 'textarea',
    'wysiwyg_enabled'	=> true,
    'is_html_allowed_on_front'	=> true,	
    'visible'			=> true,
    'required'			=> false,
    'searchable'		=> false,
    'filterable'		=> false,
    'comparable'		=> false,
    'user_defined'		=> true,
    'visible_on_front'	=> true,
    'global'			=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));

$installer->addAttribute($entityTypeId, 'enhanced_category_top_cta', array(
    'group'				=> 'Enhanced Category',
    'label'				=> 'Top Heading CTA',
    'note'				=> "Link for Top Content",
	'input_renderer' => 'categoryatribute/adminhtml_helper_jcf',
	'default' 			=> '{"controls":{"locked":true,"maxrows":1,"fields":["url","text"]},"data":[]}',
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


$installer->addAttribute($entityTypeId, 'enhanced_category_top_block', array(
    'group'				=> 'Enhanced Category',
    'label'				=> 'Top Content Block',
    'note'				=> "Optional, overrides description and top content",
    'type'				=> 'varchar',
    'input'				=> 'select',
	'source'			=> 'catalog/category_attribute_source_page',
    'visible'			=> true,
    'required'			=> false,
    'searchable'		=> false,
    'filterable'		=> false,
    'comparable'		=> false,
    'user_defined'		=> true,
    'visible_on_front'	=> true,
    'global'			=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));

$installer->addAttribute($entityTypeId, 'enhanced_category_end_content', array(
    'group'				=> 'Enhanced Category',
    'label'				=> 'Bottom Content Editor',
    'note'				=> "Optional",
    'type'				=> 'text',
    'input'				=> 'textarea',
    'visible'			=> true,
    'required'			=> false,
	'wysiwyg_enabled'	=> true,
    'is_html_allowed_on_front'	=> true,
    'searchable'		=> false,
    'filterable'		=> false,
    'comparable'		=> false,
    'user_defined'		=> true,
    'visible_on_front'	=> true,
    'global'			=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));


$installer->addAttribute($entityTypeId, 'enhanced_category_end_cta', array(
    'group'				=> 'Enhanced Category',
    'label'				=> 'Bottom Heading CTA',
    'note'				=> "Link for Bottom Content",
	'input_renderer' => 'categoryatribute/adminhtml_helper_jcf',
	'default' 			=> '{"controls":{"locked":true,"maxrows":1,"fields":["url","text"]},"data":[]}',
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


$installer->addAttribute($entityTypeId, 'enhanced_category_end_block', array(
    'group'				=> 'Enhanced Category',
    'label'				=> 'Bottom Content Block',
    'note'				=> "Optional",
    'type'				=> 'varchar',
    'input'				=> 'select',
	'source'			=> 'catalog/category_attribute_source_page',
    'visible'			=> true,
    'required'			=> false,
    'searchable'		=> false,
    'filterable'		=> false,
    'comparable'		=> false,
    'user_defined'		=> true,
    'visible_on_front'	=> true,
    'global'			=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));



$installer->endSetup();