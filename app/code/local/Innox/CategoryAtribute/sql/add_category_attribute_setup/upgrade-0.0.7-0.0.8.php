<?php 

$installer = $this;

$installer->startSetup();
$entityTypeId = 'catalog_product';

$installer->addAttribute($entityTypeId, 'ask_a_pharmacist', array(
    'group'				=> 'SEO',
    'label'				=> 'Ask A Pharmacist',
    'note'				=> "Add lots of rows",
    'type'				=> 'text',
    'input'				=> 'textarea',
    'input_renderer'     => 'categoryatribute/adminhtml_helper_jcf',
	'default' 			=> '{"controls":{"locked":true,"maxrows":-1,"fields":["question","answer","author","date"]},"data":[]}',
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