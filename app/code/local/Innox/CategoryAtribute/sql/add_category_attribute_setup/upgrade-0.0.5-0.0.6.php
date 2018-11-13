<?php
$installer = $this;

$installer->startSetup();
$entityTypeId = 'catalog_product';



$installer->addAttribute($entityTypeId, 'related_guide_content', array(
    'group'				=> 'SEO',
    'label'				=> 'Related Content',
    'note'				=> "Pick related guide contents",
    'type'				=> 'varchar',
    'input'				=> 'multiselect',
	'backend'			=> 'eav/entity_attribute_backend_array',
	'source'			=> 'categoryatribute/attribute_source_guides',
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
