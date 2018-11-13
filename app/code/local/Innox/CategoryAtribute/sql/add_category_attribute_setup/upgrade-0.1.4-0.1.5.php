<?php
$installer = $this;

$installer->startSetup();
$entityTypeId = 'catalog_category';



$installer->addAttribute($entityTypeId, 'promotional_category_image', array(
    'group'				=> 'Merchandising',
    'label'				=> 'Promotional Image',
    'note'				=> "Header image",
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

$installer->endSetup();
