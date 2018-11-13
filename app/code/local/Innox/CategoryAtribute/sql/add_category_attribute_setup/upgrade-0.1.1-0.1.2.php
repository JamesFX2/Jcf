<?php
$installer = $this;

$installer->startSetup();
$entityTypeId = 'catalog_category';

$installer->addAttribute($entityTypeId, 'enhanced_category_end_heading', array(
    'group'				=> 'Enhanced Category',
    'label'				=> 'Bottom Heading',
    'note'				=> "Bottom heading for page",
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


$installer->endSetup();