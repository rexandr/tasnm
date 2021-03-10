<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProductAttributeValues */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-attribute-values-form box box-primary">

    <?php print_r($id) ?>
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'product_attribute_id')->dropDownList(\yii\helpers\ArrayHelper::map($productAttributesReposiory->getProductAttributes(), 'id', 'attribute')) ?>

        <?= $form->field($model, 'product_id')->textInput(['value'=>$id]) ?>

        <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'status')->dropDownList(\common\helpers\StatusHelper::getStatusLabels()) ?>

        <?= $form->field($model, 'sort_order')->textInput() ?>

        <?= $form->field($model, 'created_at')->textInput() ?>

        <?= $form->field($model, 'updated_at')->textInput() ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
