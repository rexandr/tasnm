<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\product\Product */

$this->title = Yii::t('app', 'Create Product');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">

    <?= $this->render('_form', [
    'model' => $model,
        'menuRepository' => $menuRepository,
        'brandRepository' => $brandRepository
    ]) ?>

</div>
