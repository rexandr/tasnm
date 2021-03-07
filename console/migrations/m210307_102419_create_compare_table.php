<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%compare}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%product_attribute_values}}`
 * - `{{%user}}`
 */
class m210307_102419_create_compare_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%compare}}', [
            'id' => $this->primaryKey(),
            'product_attribute_value_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'compare_name' => $this->string()->defaultValue(null),
            'status' => $this->integer()->defaultValue(null),
            'sort_order' => $this->integer()->defaultValue(null),
            'created_at' => $this->integer()->defaultValue(null),
            'updated_at' => $this->integer()->defaultValue(null),
        ]);

        // creates index for column `product_attribute_value_id`
        $this->createIndex(
            '{{%idx-compare-product_attribute_value_id}}',
            '{{%compare}}',
            'product_attribute_value_id'
        );

        // add foreign key for table `{{%product_attribute_values}}`
        $this->addForeignKey(
            '{{%fk-compare-product_attribute_value_id}}',
            '{{%compare}}',
            'product_attribute_value_id',
            '{{%product_attribute_values}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-compare-user_id}}',
            '{{%compare}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-compare-user_id}}',
            '{{%compare}}',
            'user_id',
            '{{%user}}',
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
            '{{%fk-compare-product_attribute_value_id}}',
            '{{%compare}}'
        );

        // drops index for column `product_attribute_value_id`
        $this->dropIndex(
            '{{%idx-compare-product_attribute_value_id}}',
            '{{%compare}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-compare-user_id}}',
            '{{%compare}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-compare-user_id}}',
            '{{%compare}}'
        );

        $this->dropTable('{{%compare}}');
    }
}
