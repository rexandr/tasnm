<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_attribute".
 *
 * @property int $id
 * @property string $attribute
 * @property int|null $status
 * @property int|null $sort_order
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property ProductAttributeValues[] $productAttributeValues
 */
class ProductAttribute extends \common\models\base\ActiveModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_attribute';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['attribute'], 'required'],
            [['status', 'sort_order', 'created_at', 'updated_at'], 'integer'],
            [['attribute'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'attribute' => Yii::t('app', 'Attribute'),
            'status' => Yii::t('app', 'Status'),
            'sort_order' => Yii::t('app', 'Sort Order'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[ProductAttributeValues]].
     *
     * @return \yii\db\ActiveQuery|ProductAttributeValuesQuery
     */
    public function getProductAttributeValues()
    {
        return $this->hasMany(ProductAttributeValues::className(), ['product_attribute_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ProductAttributeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductAttributeQuery(get_called_class());
    }
}
