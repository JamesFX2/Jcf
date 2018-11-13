<?php
$installer = $this;

$installer->startSetup();
$entityTypeId = 'catalog_category';


$installer->addAttribute($entityTypeId, 'ec_footer_bgcolor', array(
    'group'				=> 'Footer Fancy Box',
    'label'				=> 'Footer Background Colour',
    'note'				=> "Background colour for mobile and fixed size backgrounds. This also sets a high contrast text colour.",
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


$installer->addAttribute($entityTypeId, 'ec_footer_bgwidth',  array(
    'group'				=> 'Footer Fancy Box',
    'label'				=> 'Footer Background Width',
    'note'				=> "Stretched or fixed sized background",
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
				0 => 'stretched',
				1 => 'fixed',
				2 => 'repeat',
			]
    ],
    'user_defined'		=> true,
    'visible_on_front'	=> true,
    'global'			=> Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));
$installer->endSetup();
