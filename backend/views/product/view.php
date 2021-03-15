<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model backend\models\product\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view box box-primary">
    <div class="box-header">
        <?= Html::a(Yii::t('app', 'Add attribute'), ['/product-attribute-values/create', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-flat',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
        <?php

        Modal::begin([
                'header' => '<h2>Draste</h2>',
                'toggleButton' => ['label' => 'kick me'],
                'footer' => 'footer',
        ]);

        echo '<h1>'.$model->name.'</h1>' ;
        echo '<br>';

        echo '<pre>';
        foreach ($attributes as $attribute)
        {
            echo $attribute->attribute;
            //echo ' - '.$value->product_attribute_id;
            echo '<br>';
        }
        //print_r($attributes);
        echo '</pre>';



        echo '<pre>';
        foreach ($values as $value)
        {
            echo $value->value;
            echo ' - '.$value->product_attribute_id;
            echo '<br>';
        }
        //print_r($attributes);
        echo '</pre>';

        foreach ($productAttributeValues as $productAttributeValue)
        {
            echo $productAttributeValue->value;
            echo ' - '.$productAttributeValue->product_attribute_id;
            echo '<br>';
        }

        Modal::end();

        ?>
    </div>
    <div class="box-body table-responsive no-padding">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'menu_id',
                'brands_id',
                'name',
                'rate',
                'price',
                'review',
                'description',
                'image',
                'status',
                'sort_order',
                'created_at:datetime',
                'updated_at:datetime',
            ],
        ]) ?>
    </div>
</div>
