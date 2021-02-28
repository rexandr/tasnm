<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 */
class m210228_150714_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'customer_id' => $this->integer()->notNull(),
            'product_values_id' => $this->integer()->notNull(),
            'brand' => $this->string()->notNull(),
            'product' => $this->string()->notNull(),
            'size' => $this->string()->notNull(),
            'price' => $this->decimal(8,2)->notNull(),
            'count' => $this->integer()->notNull(),
            'total' => $this->decimal(8,2)->notNull(),
            'status' => $this->integer()->defaultValue(null),
            'created_at' => $this->integer()->defaultValue(null),
            'updated_at' => $this->integer()->defaultValue(null),
        ]);
        $this->createIndex('idx-order-product_values_id', '{{%order}}', 'product_values_id');
        $this->createIndex('idx-order-customer_id', '{{%order}}', 'customer_id');
        $this->addForeignKey(
            'fk-order-customer_id',
            '{{%order}}',
            'customer_id',
            '{{%customer}}',
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
        $this->dropTable('{{%order}}');
    }
}
