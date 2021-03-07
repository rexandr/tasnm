<?php
namespace common\models\base;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class ActiveModel extends ActiveRecord
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [TimestampBehavior::className()]
        );
    }
}