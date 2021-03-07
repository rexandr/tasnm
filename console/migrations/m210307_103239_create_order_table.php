<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%product_attribute_values}}`
 * - `{{%customer}}`
 */
class m210307_103239_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'product_attribute_value_id' => $this->integer()->notNull(),
            'customer_id' => $this->integer()->notNull(),
            'product' => $this->string()->notNull(),
            'count' => $this->integer()->defaultValue(null),
            'price' => $this->decimal(8,2)->notNull(),
            'total_price' => $this->integer()->defaultValue(null),
            'status' => $this->integer()->defaultValue(null),
            'created_at' => $this->integer()->defaultValue(null),
            'updated_at' => $this->integer()->defaultValue(null),
        ]);

        // creates index for column `product_attribute_value_id`
        $this->createIndex(
            '{{%idx-order-product_attribute_value_id}}',
            '{{%order}}',
            'product_attribute_value_id'
        );

        // add foreign key for table `{{%product_attribute_values}}`
        $this->addForeignKey(
            '{{%fk-order-product_attribute_value_id}}',
            '{{%order}}',
            'product_attribute_value_id',
            '{{%product_attribute_values}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        // creates index for column `customer_id`
        $this->createIndex(
            '{{%idx-order-customer_id}}',
            '{{%order}}',
            'customer_id'
        );

        // add foreign key for table `{{%customer}}`
        $this->addForeignKey(
            '{{%fk-order-customer_id}}',
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
        // drops foreign key for table `{{%product_attribute_values}}`
        $this->dropForeignKey(
            '{{%fk-order-product_attribute_value_id}}',
            '{{%order}}'
        );

        // drops index for column `product_attribute_value_id`
        $this->dropIndex(
            '{{%idx-order-product_attribute_value_id}}',
            '{{%order}}'
        );

        // drops foreign key for table `{{%customer}}`
        $this->dropForeignKey(
            '{{%fk-order-customer_id}}',
            '{{%order}}'
        );

        // drops index for column `customer_id`
        $this->dropIndex(
            '{{%idx-order-customer_id}}',
            '{{%order}}'
        );

        $this->dropTable('{{%order}}');
    }
}
