<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_tag}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%product}}`
 * - `{{%tag}}`
 */
class m210307_103049_create_product_tag_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_tag}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'tag_id' => $this->integer()->notNull(),
            'sort_order' => $this->integer()->defaultValue(null),
            'created_at' => $this->integer()->defaultValue(null),
            'updated_at' => $this->integer()->defaultValue(null),
        ]);

        // creates index for column `product_id`
        $this->createIndex(
            '{{%idx-product_tag-product_id}}',
            '{{%product_tag}}',
            'product_id'
        );

        // add foreign key for table `{{%product}}`
        $this->addForeignKey(
            '{{%fk-product_tag-product_id}}',
            '{{%product_tag}}',
            'product_id',
            '{{%product}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        // creates index for column `tag_id`
        $this->createIndex(
            '{{%idx-product_tag-tag_id}}',
            '{{%product_tag}}',
            'tag_id'
        );

        // add foreign key for table `{{%tag}}`
        $this->addForeignKey(
            '{{%fk-product_tag-tag_id}}',
            '{{%product_tag}}',
            'tag_id',
            '{{%tag}}',
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
        // drops foreign key for table `{{%product}}`
        $this->dropForeignKey(
            '{{%fk-product_tag-product_id}}',
            '{{%product_tag}}'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            '{{%idx-product_tag-product_id}}',
            '{{%product_tag}}'
        );

        // drops foreign key for table `{{%tag}}`
        $this->dropForeignKey(
            '{{%fk-product_tag-tag_id}}',
            '{{%product_tag}}'
        );

        // drops index for column `tag_id`
        $this->dropIndex(
            '{{%idx-product_tag-tag_id}}',
            '{{%product_tag}}'
        );

        $this->dropTable('{{%product_tag}}');
    }
}
