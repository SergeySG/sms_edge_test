<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%send_log_aggregated}}`.
 */
class m190423_084729_create_send_log_aggregated_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%send_log_aggregated}}', [
            'ag_log_id' => $this->primaryKey(),
            'date' => $this->date()->notNull(),
            'usr_id' => $this->integer()->notNull(),
            'cnt_id' => $this->integer()->notNull(),
            'total_successful' => $this->integer(),
            'total_failed' => $this->integer(),
        ]);


        // creates index for column `date`
        $this->createIndex(
            'idx-date',
            'send_log_aggregated',
            'date'
        );

        // creates index for column `cnt_id`
        $this->createIndex(
            'idx-cnt_id',
            'send_log_aggregated',
            'cnt_id'
        );

        // creates index for column `usr_id`
        $this->createIndex(
            'idx-usr_id',
            'send_log_aggregated',
            'usr_id'
        );


        // add foreign key for table `users`
        $this->addForeignKey(
            'fk-ag_usr_id',
            'send_log_aggregated',
            'usr_id',
            'users',
            'usr_id',
            'NO ACTION'
        );


        // add foreign key for table `countries`
        $this->addForeignKey(
            'fk-ag_cnt_id',
            'send_log_aggregated',
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
        $this->dropTable('{{%send_log_aggregated}}');
    }
}
