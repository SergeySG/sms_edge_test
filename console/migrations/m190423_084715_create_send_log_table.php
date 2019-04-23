<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%send_log}}`.
 */
class m190423_084715_create_send_log_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%send_log}}', [
            'id' => $this->primaryKey(),
            'usr_id' => $this->integer(),
            'num_id' => $this->integer(),
            'log_message' => $this->string(),
            'log_success' => $this->boolean(),
            'log_created' => $this->integer()->notNull()
        ]);


        // add foreign key for table `users`
        $this->addForeignKey(
            'fk-usr_id',
            'send_log',
            'usr_id',
            'users',
            'usr_id',
            'NO ACTION'
        );


        // add foreign key for table `countries`
        $this->addForeignKey(
            'fk-cnt_id',
            'send_log',
            'cnt_id',
            'countries',
            'cnt_id',
            'NO ACTION'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%send_log}}');
    }
}
