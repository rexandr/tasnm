<?php
namespace backend\controllers;

use yii\web\Controller;

class AddAttributeValuesController extends Controller
{
    public function actionAddAttributeValue()
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
}