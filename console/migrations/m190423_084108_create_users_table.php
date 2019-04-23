<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m190423_084108_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'usr_id' => $this->primaryKey(),
            'usr_name' => $this->string()->notNull(),
            'usr_active' => $this->tinyInteger()->notNull()->defaultValue(0),
            'usr_created' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
