<?php
$installer = $this;

$installer->startSetup();
$entityTypeId = 'catalog_category';



$installer->addAttribute($entityTypeId, 'promotional_category_pfrom', array(
    'group'				=> 'Merchandising',
    'label'				=> 'Promotion From',
    'note'				=> "Promotion From Date",
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
