<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_attribute_values}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%product_attribute}}`
 * - `{{%product}}`
 */
class m210307_101951_create_product_attribute_values_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_attribute_values}}', [
            'id' => $this->primaryKey(),
            'product_attribute_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
            'value' => $this->string()->notNull(),
            'status' => $this->integer()->defaultValue(null),
            'sort_order' => $this->integer()->defaultValue(null),
            'created_at' => $this->integer()->defaultValue(null),
            'updated_at' => $this->integer()->defaultValue(null),
        ]);

        // creates index for column `product_attribute_id`
        $this->createIndex(
            '{{%idx-product_attribute_values-product_attribute_id}}',
            '{{%product_attribute_values}}',
            'product_attribute_id'
        );

        // add foreign key for table `{{%product_attribute}}`
        $this->addForeignKey(
            '{{%fk-product_attribute_values-product_attribute_id}}',
            '{{%product_attribute_values}}',
            'product_attribute_id',
            '{{%product_attribute}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        // creates index for column `product_id`
        $this->createIndex(
            '{{%idx-product_attribute_values-product_id}}',
            '{{%product_attribute_values}}',
            'product_id'
        );

        // add foreign key for table `{{%product}}`
        $this->addForeignKey(
            '{{%fk-product_attribute_values-product_id}}',
            '{{%product_attribute_values}}',
            'product_id',
            '{{%product}}',
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
        // drops foreign key for table `{{%product_attribute}}`
        $this->dropForeignKey(
            '{{%fk-product_attribute_values-product_attribute_id}}',
            '{{%product_attribute_values}}'
        );

        // drops index for column `product_attribute_id`
        $this->dropIndex(
            '{{%idx-product_attribute_values-product_attribute_id}}',
            '{{%product_attribute_values}}'
        );

        // drops foreign key for table `{{%product}}`
        $this->dropForeignKey(
            '{{%fk-product_attribute_values-product_id}}',
            '{{%product_attribute_values}}'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            '{{%idx-product_attribute_values-product_id}}',
            '{{%product_attribute_values}}'
        );

        $this->dropTable('{{%product_attribute_values}}');
    }
}
