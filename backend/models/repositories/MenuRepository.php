<?php
namespace backend\models\repositories;

use common\models\Menu;

class MenuRepository
{
    public function getLowDepthProduct()
    {
        return Menu::find()
            ->filterByDepth()
            ->all();
    }
}