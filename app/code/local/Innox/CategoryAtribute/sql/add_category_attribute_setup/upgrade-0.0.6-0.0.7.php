<?php 

$installer = $this;

$installer->startSetup();
$entityTypeId = 'catalog_category';



$installer->addAttribute($entityTypeId, 'enhanced_category_links_box', array(
    'group'				=> 'Enhanced Category',
    'label'				=> 'Links Box',
    'note'				=> "Add lots of rows",
    'type'				=> 'text',
    'input'				=> 'textarea',
    'input_renderer'     => 'categoryatribute/adminhtml_helper_jcf',
	'default' 			=> '{"controls":{"locked":true,"maxrows":20,"fields":["url","text","description","image"]},"data":[]}',
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