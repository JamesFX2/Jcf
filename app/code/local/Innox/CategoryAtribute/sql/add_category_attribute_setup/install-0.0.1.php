<?php
$this->startSetup();
$this->addAttribute(Mage_Catalog_Model_Category::ENTITY, 'visible_in_cat', array(
    'group'         => 'General Information',
    'input' => 'select',
    'type' => 'int',
	'default' => 1,
    'source' => 'eav/entity_attribute_source_boolean',
    'label'         => 'Visible in Cat',
    'visible'       => true,
    'required'      => false,
    'visible_on_front' => true,
    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
));
 
$this->endSetup();

