<?php
$installer = $this;

$installer->startSetup();
$entityTypeId = 'catalog_category';


$installer->addAttribute($entityTypeId, 'enhanced_category_slider', array(
    'group'				=> 'Enhanced Category',
    'label'				=> 'Product Selector',
    'note'				=> "Pick products for the slider",
    'type'				=> 'varchar',
    'input'				=> 'multiselect',
	'backend'			=> 'eav/entity_attribute_backend_array',
	'source'			=> 'categoryatribute/attribute_source_type',
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
