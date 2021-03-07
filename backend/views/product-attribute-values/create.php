<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ProductAttributeValues */

$this->title = Yii::t('app', 'Create Product Attribute Values');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Product Attribute Values'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-attribute-values-create">

    <?= $this->render('_form', [
    'model' => $model,
        'productAttributesReposiory' => $productAttributesReposiory
    ]) ?>

</div>
