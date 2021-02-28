<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%condition}}`.
 */
class m210228_150459_create_condition_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%condition}}', [
            'id' => $this->primaryKey(),
            'condition' =>$this->integer()->notNull(),
            'status' => $this->integer()->defaultValue(null),
            'created_at' => $this->integer()->defaultValue(null),
            'updated_at' => $this->integer()->defaultValue(null),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%condition}}');
    }
}
