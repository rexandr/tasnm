<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $menu_id
 * @property int $brands_id
 * @property string $name
 * @property int|null $rate
 * @property float $price
 * @property int|null $review
 * @property string|null $description
 * @property string|null $image
 * @property int|null $status
 * @property int|null $sort_order
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Comment[] $comments
 * @property Brands $brands
 * @property Menu $menu
 * @property ProductAttributeValues[] $productAttributeValues
 * @property ProductTag[] $productTags
 */
class Product extends \common\models\base\ActiveModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['menu_id', 'brands_id', 'name', 'price'], 'required'],
            [['menu_id', 'brands_id', 'rate', 'review', 'status', 'sort_order', 'created_at', 'updated_at'], 'integer'],
            [['price'], 'number'],
            [['name', 'description', 'image'], 'string', 'max' => 255],
            [['brands_id'], 'exist', 'skipOnError' => true, 'targetClass' => Brands::className(), 'targetAttribute' => ['brands_id' => 'id']],
            [['menu_id'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::className(), 'targetAttribute' => ['menu_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'menu_id' => Yii::t('app', 'Category'),
            'brands_id' => Yii::t('app', 'Brands ID'),
            'name' => Yii::t('app', 'Name'),
            'rate' => Yii::t('app', 'Rate'),
            'price' => Yii::t('app', 'Price'),
            'review' => Yii::t('app', 'Review'),
            'description' => Yii::t('app', 'Description'),
            'image' => Yii::t('app', 'Image'),
            'status' => Yii::t('app', 'Status'),
            'sort_order' => Yii::t('app', 'Sort Order'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery|CommentQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Brands]].
     *
     * @return \yii\db\ActiveQuery|BrandsQuery
     */
    public function getBrands()
    {
        return $this->hasOne(Brands::className(), ['id' => 'brands_id']);
    }

    /**
     * Gets query for [[Menu]].
     *
     * @return \yii\db\ActiveQuery|MenuQuery
     */
    public function getMenu()
    {
        return $this->hasOne(Menu::className(), ['id' => 'menu_id']);
    }

    /**
     * Gets query for [[ProductAttributeValues]].
     *
     * @return \yii\db\ActiveQuery|ProductAttributeValuesQuery
     */
    public function getProductAttributeValues()
    {
        return $this->hasMany(ProductAttributeValues::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[ProductTags]].
     *
     * @return \yii\db\ActiveQuery|ProductTagQuery
     */
    public function getProductTags()
    {
        return $this->hasMany(ProductTag::className(), ['product_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return ProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductQuery(get_called_class());
    }
}
