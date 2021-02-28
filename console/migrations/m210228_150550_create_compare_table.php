<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%compare}}`.
 */
class m210228_150550_create_compare_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%compare}}', [
            'id' => $this->primaryKey(),
            'product_values_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'status' => $this->integer()->defaultValue(null),
            'created_at' => $this->integer()->defaultValue(null),
            'updated_at' => $this->integer()->defaultValue(null),
        ]);
        $this->createIndex('idx-compare-user_id', '{{%compare}}', 'user_id');
        $this->createIndex('idx-compare-product_values_id', '{{%compare}}', 'product_values_id');
        $this->addForeignKey(
            'fk-compare-user_id',
            '{{%compare}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-compare-product_values_id',
            '{{%compare}}',
            'product_values_id',
            '{{%product_values}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%compare}}');
    }
}
