<?php
$installer = $this;

$installer->startSetup();
$entityTypeId = 'catalog_category';


$installer->addAttribute($entityTypeId, 'enhanced_category_image', array(
    'group'				=> 'Enhanced Category',
    'label'				=> 'Header Image',
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

$installer->addAttribute($entityTypeId, 'enhanced_category_colour', array(
    'group'				=> 'Enhanced Category',
    'label'				=> 'Primary Colour',
    'note'				=> "Pick the colour of boxes and similar things. Leave blank for default",
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
$installer->endSetup();