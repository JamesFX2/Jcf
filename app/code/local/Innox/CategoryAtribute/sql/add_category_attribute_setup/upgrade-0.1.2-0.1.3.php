<?php
$installer = $this;

$installer->startSetup();
$entityTypeId = 'catalog_product';



$installer->addAttribute($entityTypeId, 'update_author', array(
    'group'				=> 'SEO',
    'label'				=> 'Updated By',
    'note'				=> "Set the medical content writer",
    'type'				=> 'int',
    'input'				=> 'select',
	'backend'			=> 'eav/entity_attribute_backend_array',
	'source'			=> 'categoryatribute/attribute_source_pharmacists',
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
