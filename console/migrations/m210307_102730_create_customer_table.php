<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%customer}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%delivery}}`
 * - `{{%payment}}`
 */
class m210307_102730_create_customer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%customer}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'delivery_id' => $this->integer()->notNull(),
            'payment_id' => $this->integer()->notNull(),
            'name' => $this->string()->notNull(),
            'surname' => $this->string()->notNull(),
            'phone' => $this->string()->notNull(),
            'email' => $this->string()->defaultValue(null),
            'comment' => $this->string()->defaultValue(null),
            'status' => $this->integer()->defaultValue(null),
            'sort_order' => $this->integer()->defaultValue(null),
            'created_at' => $this->integer()->defaultValue(null),
            'updated_at' => $this->integer()->defaultValue(null),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-customer-user_id}}',
            '{{%customer}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-customer-user_id}}',
            '{{%customer}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        // creates index for column `delivery_id`
        $this->createIndex(
            '{{%idx-customer-delivery_id}}',
            '{{%customer}}',
            'delivery_id'
        );

        // add foreign key for table `{{%delivery}}`
        $this->addForeignKey(
            '{{%fk-customer-delivery_id}}',
            '{{%customer}}',
            'delivery_id',
            '{{%delivery}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        // creates index for column `payment_id`
        $this->createIndex(
            '{{%idx-customer-payment_id}}',
            '{{%customer}}',
            'payment_id'
        );

        // add foreign key for table `{{%payment}}`
        $this->addForeignKey(
            '{{%fk-customer-payment_id}}',
            '{{%customer}}',
            'payment_id',
            '{{%payment}}',
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
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-customer-user_id}}',
            '{{%customer}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-customer-user_id}}',
            '{{%customer}}'
        );

        // drops foreign key for table `{{%delivery}}`
        $this->dropForeignKey(
            '{{%fk-customer-delivery_id}}',
            '{{%customer}}'
        );

        // drops index for column `delivery_id`
        $this->dropIndex(
            '{{%idx-customer-delivery_id}}',
            '{{%customer}}'
        );

        // drops foreign key for table `{{%payment}}`
        $this->dropForeignKey(
            '{{%fk-customer-payment_id}}',
            '{{%customer}}'
        );

        // drops index for column `payment_id`
        $this->dropIndex(
            '{{%idx-customer-payment_id}}',
            '{{%customer}}'
        );

        $this->dropTable('{{%customer}}');
    }
}
