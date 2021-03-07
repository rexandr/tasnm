<?php
namespace backend\models\repositories;

use common\models\ProductAttribute;

class ProductAttributesRepository
{
    public function getProductAttributes()
    {
        return ProductAttribute::find()->all();
    }
}