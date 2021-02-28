<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_values}}`.
 */
class m210228_150339_create_product_values_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_values}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'catalog_id' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
            'brand_id' => $this->integer()->notNull(),
            'size_id' => $this->integer()->notNull(),
            'color_id' => $this->integer()->notNull(),
            'tag_id' => $this->integer()->notNull(),
            'availability_id' => $this->integer()->notNull(),
            'condition_id' => $this->integer()->notNull(),
            'status' => $this->integer()->defaultValue(null),
            'created_at' => $this->integer()->defaultValue(null),
            'updated_at' => $this->integer()->defaultValue(null),
        ]);
        $this->createIndex('idx-product_values-product_id', '{{%product_values}}', 'product_id');
        $this->addForeignKey(
            'fk-product_values-product_id',
            '{{%product_values}}',
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
        $this->dropTable('{{%product_values}}');
    }
}
