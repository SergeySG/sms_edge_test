<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%countries}}`.
 */
class m190423_084634_create_countries_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%countries}}', [
            'cnt_id'=> $this->primaryKey(),
            'cnt_code' => $this->string(3)->notNull(),
            'cnt_title'=> $this->string(64)->notNull(),
            'cnt_created'=>$this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%countries}}');
    }
}
