<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%wishlist}}`.
 */
class m210228_150533_create_wishlist_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%wishlist}}', [
            'id' => $this->primaryKey(),
            'product_values_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'status' => $this->integer()->defaultValue(null),
            'created_at' => $this->integer()->defaultValue(null),
            'updated_at' => $this->integer()->defaultValue(null),
        ]);
        $this->createIndex('idx-wishlist-user_id', '{{%wishlist}}', 'user_id');
        $this->createIndex('idx-wishlist-product_values_id', '{{%wishlist}}', 'product_values_id');
        $this->addForeignKey(
            'fk-wishlist-user_id',
            '{{%wishlist}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
        $this->addForeignKey(
            'fk-wishlist-product_values_id',
            '{{%wishlist}}',
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
        $this->dropTable('{{%wishlist}}');
    }
}
