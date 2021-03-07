<?php

use yii\db\Migration;
use common\models\User;

/**
 * Handles adding columns to table `{{%user}}`.
 */
class m210307_112339_add_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(User::tableName(), 'image', $this->string()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn(User::tableName(), 'image');
    }
}
