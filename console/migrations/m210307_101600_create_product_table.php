<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%menu}}`
 * - `{{%brands}}`
 */
class m210307_101600_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'menu_id' => $this->integer()->notNull(),
            'brands_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'rate' => $this->integer()->defaultValue(null),
            'price' => $this->decimal(8,2)->notNull(),
            'review' => $this->integer()->defaultValue(null),
            'description' => $this->string()->defaultValue(null),
            'image' => $this->string()->defaultValue(null),
            'status' => $this->integer()->defaultValue(null),
            'sort_order' => $this->integer()->defaultValue(null),
            'created_at' => $this->integer()->defaultValue(null),
            'updated_at' => $this->integer()->defaultValue(null),
        ]);

        // creates index for column `menu_id`
        $this->createIndex(
            '{{%idx-product-menu_id}}',
            '{{%product}}',
            'menu_id'
        );

        // add foreign key for table `{{%menu}}`
        $this->addForeignKey(
            '{{%fk-product-menu_id}}',
            '{{%product}}',
            'menu_id',
            '{{%menu}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        // creates index for column `brands_id`
        $this->createIndex(
            '{{%idx-product-brands_id}}',
            '{{%product}}',
            'brands_id'
        );

        // add foreign key for table `{{%brands}}`
        $this->addForeignKey(
            '{{%fk-product-brands_id}}',
            '{{%product}}',
            'brands_id',
            '{{%brands}}',
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
        // drops foreign key for table `{{%menu}}`
        $this->dropForeignKey(
            '{{%fk-product-menu_id}}',
            '{{%product}}'
        );

        // drops index for column `menu_id`
        $this->dropIndex(
            '{{%idx-product-menu_id}}',
            '{{%product}}'
        );

        // drops foreign key for table `{{%brands}}`
        $this->dropForeignKey(
            '{{%fk-product-brands_id}}',
            '{{%product}}'
        );

        // drops index for column `brands_id`
        $this->dropIndex(
            '{{%idx-product-brands_id}}',
            '{{%product}}'
        );

        $this->dropTable('{{%product}}');
    }
}
