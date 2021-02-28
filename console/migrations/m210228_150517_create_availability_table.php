<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%availability}}`.
 */
class m210228_150517_create_availability_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%availability}}', [
            'id' => $this->primaryKey(),
            'avalable' => $this->string()->notNull(),
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
        $this->dropTable('{{%availability}}');
    }
}
