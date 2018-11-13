<?php
$installer = $this;

$installer->startSetup();
$entityTypeId = 'catalog_category';



$installer->addAttribute($entityTypeId, 'promotional_category_pto', array(
    'group'				=> 'Merchandising',
    'label'				=> 'Promotion To',
    'note'				=> "Promotion To Date",
    'type'				=> 'datetime',
    'input'				=> 'date',
    'visible'			=> true,
    'required'			=> false,
    'backend'       	=> 'eav/entity_attribute_backend_datetime',
    'frontend'			=> '',
    'searchable'		=> false,
    'filterable'		=> false,
    'comparable'		=> false,
    'user_defined'		=> true,
    'visible_on_front'	=> true,
    'global'			=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));

$installer->endSetup();
