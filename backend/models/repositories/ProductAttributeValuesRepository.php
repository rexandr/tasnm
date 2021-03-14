<?php
namespace backend\models\repositories;
use common\models\ProductAttribute;
use common\models\ProductAttributeValues;

class ProductAttributeValuesRepository
{
    public function getProductAttributeValues($id)
    {
        return ProductAttributeValues::find()
            //->select('id,product_attribute_id,product_id,value')
            ->where(['product_id' => $id])
            ->all();
    }

//    public function getProductAttributes()
//    {
//        $productAttributes = ProductAttribute::findOne(2);
//        $productAttributesValues = $productAttributes->getProductAttributeValues()->all();
//        return $productAttributesValues;
//    }
}