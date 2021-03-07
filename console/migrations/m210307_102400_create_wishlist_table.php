<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%wishlist}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%product_attribute_values}}`
 * - `{{%user}}`
 */
class m210307_102400_create_wishlist_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%wishlist}}', [
            'id' => $this->primaryKey(),
            'product_attribute_value_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'sort_order' => $this->integer()->defaultValue(null),
            'status' => $this->integer()->defaultValue(null),
            'created_at' => $this->integer()->defaultValue(null),
            'updated_at' => $this->integer()->defaultValue(null),
        ]);

        // creates index for column `product_attribute_value_id`
        $this->createIndex(
            '{{%idx-wishlist-product_attribute_value_id}}',
            '{{%wishlist}}',
            'product_attribute_value_id'
        );

        // add foreign key for table `{{%product_attribute_values}}`
        $this->addForeignKey(
            '{{%fk-wishlist-product_attribute_value_id}}',
            '{{%wishlist}}',
            'product_attribute_value_id',
            '{{%product_attribute_values}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-wishlist-user_id}}',
            '{{%wishlist}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-wishlist-user_id}}',
            '{{%wishlist}}',
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
            '{{%fk-wishlist-product_attribute_value_id}}',
            '{{%wishlist}}'
        );

        // drops index for column `product_attribute_value_id`
        $this->dropIndex(
            '{{%idx-wishlist-product_attribute_value_id}}',
            '{{%wishlist}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-wishlist-user_id}}',
            '{{%wishlist}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-wishlist-user_id}}',
            '{{%wishlist}}'
        );

        $this->dropTable('{{%wishlist}}');
    }
}
