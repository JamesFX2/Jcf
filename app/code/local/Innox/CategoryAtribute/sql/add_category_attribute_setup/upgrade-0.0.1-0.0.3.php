<?php
$installer = $this;

$installer->startSetup();
$entityTypeId = 'catalog_category';

$installer->addAttribute($entityTypeId, 'category_second_hierarchy', array(
    'group'         => 'General Information',
    'input' => 'select',
    'type' => 'int',
	'default' => 0,
    'source' => 'eav/entity_attribute_source_boolean',
    'note'		    => "Pushes this category into the second block of icons.",	
    'label'         => 'Second block of category icons',
    'backend'       => '',
    'filterable'	=> false,
    'comparable'	=> false,
    'user_defined'	=> true,
    'visible'       => true,
    'required'      => false,
    'visible_on_front' => true,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE
));

$installer->addAttribute($entityTypeId, 'is_enhanced_page', array(
    'group'         => 'General Information',
    'input' => 'select',
    'type' => 'int',
	'default' => 0,
    'source' => 'eav/entity_attribute_source_boolean',
    'note'		    => "Enables or disables enhanced category pages.",	
    'label'         => 'Enhanced Category Page',
    'backend'       => '',
    'filterable'	=> false,
    'comparable'	=> false,
    'user_defined'	=> true,
    'visible'       => true,
    'required'      => false,
    'visible_on_front' => true,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE
));

 
$installer->endSetup();