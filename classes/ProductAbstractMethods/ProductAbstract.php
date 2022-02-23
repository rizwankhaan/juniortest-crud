<?php

namespace TestApp\ProductAbstractMethods;

abstract class ProductAbstract {

    abstract public function insertProduct($_post);
    abstract public function getAllProductsData();
    abstract public function getProductAttributeValueLabel($product);
    abstract public function getProductAttributeValueFromPost($post);
    abstract public function deleteProducts($ids);
    abstract public function checkSkuExists($sku);

}  