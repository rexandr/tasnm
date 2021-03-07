<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_attribute_values".
 *
 * @property int $id
 * @property int $product_attribute_id
 * @property int $product_id
 * @property string $value
 * @property int|null $status
 * @property int|null $sort_order
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Compare[] $compares
 * @property Order[] $orders
 * @property ProductAttribute $productAttribute
 * @property Product $product
 * @property Wishlist[] $wishlists
 */
class ProductAttributeValues extends \common\models\base\ActiveModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_attribute_values';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_attribute_id', 'product_id', 'value'], 'required'],
            [['product_attribute_id', 'product_id', 'status', 'sort_order', 'created_at', 'updated_at'], 'integer'],
            [['value'], 'string', 'max' => 255],
            [['product_attribute_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductAttribute::className(), 'targetAttribute' => ['product_attribute_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'product_attribute_id' => Yii::t('app', 'Product Attribute ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'value' => Yii::t('app', 'Value'),
            'status' => Yii::t('app', 'Status'),
            'sort_order' => Yii::t('app', 'Sort Order'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Compares]].
     *
     * @return \yii\db\ActiveQuery|CompareQuery
     */
    public function getCompares()
    {
        return $this->hasMany(Compare::className(), ['product_attribute_value_id' => 'id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery|OrderQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['product_attribute_value_id' => 'id']);
    }

    /**
     * Gets query for [[ProductAttribute]].
     *
     * @return \yii\db\ActiveQuery|ProductAttributeQuery
     */
    public function getProductAttribute()
    {
        return $this->hasOne(ProductAttribute::className(), ['id' => 'product_attribute_id']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery|ProductQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * Gets query for [[Wishlists]].
     *
     * @return \yii\db\ActiveQuery|WishlistQuery
     */
    public function getWishlists()
    {
        return $this->hasMany(Wishlist::className(), ['product_attribute_value_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ProductAttributeValuesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductAttributeValuesQuery(get_called_class());
    }
}
