<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[ProductAttributeValues]].
 *
 * @see ProductAttributeValues
 */
class ProductAttributeValuesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return ProductAttributeValues[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return ProductAttributeValues|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
