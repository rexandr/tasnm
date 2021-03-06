<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\product\Product */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Product',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="product-update">
    <?= $this->render('_form', [
        'model' => $model,
        'menuRepository' => $menuRepository,
        'brandRepository' => $brandRepository
    ]) ?>

</div>
