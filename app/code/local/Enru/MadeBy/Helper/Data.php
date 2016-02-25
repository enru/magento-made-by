<?php

class Enru_MadeBy_Helper_Data  extends Mage_Core_Helper_Abstract {

    public function manufacturerExists($manufacturer) {
        $attribute = Mage::getModel('eav/entity_attribute')
        ->loadByCode('catalog_product', 'manufacturer');

        $valuesCollection = Mage::getResourceModel('eav/entity_attribute_option_collection')
        ->setAttributeFilter($attribute->getData('attribute_id'))
        ->addFieldToFilter('value', $manufacturer)
        ->setStoreFilter(0, false);

        return count($valuesCollection) > 0;
    }
}

