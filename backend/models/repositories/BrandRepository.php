<?php
namespace backend\models\repositories;

use common\models\Brands;

class BrandRepository
{
    public function getBrands()
    {
        return Brands::find()
            ->all();
    }
}