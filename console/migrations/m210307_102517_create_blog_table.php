<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%blog}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m210307_102517_create_blog_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%blog}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'title' => $this->string()->notNull(),
            'rate' => $this->integer()->defaultValue(null),
            'description' => $this->string()->defaultValue(null),
            'image' => $this->string()->defaultValue(null),
            'status' => $this->integer()->defaultValue(null),
            'sort_order' => $this->integer()->defaultValue(null),
            'created_at' => $this->integer()->defaultValue(null),
            'updated_at' => $this->integer()->defaultValue(null),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-blog-user_id}}',
            '{{%blog}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-blog-user_id}}',
            '{{%blog}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-blog-user_id}}',
            '{{%blog}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-blog-user_id}}',
            '{{%blog}}'
        );

        $this->dropTable('{{%blog}}');
    }
}
