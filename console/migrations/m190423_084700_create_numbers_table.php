<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%numbers}}`.
 */
class m190423_084700_create_numbers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%numbers}}', [
            'num_id' => $this->primaryKey(),
            'cnt_id' => $this->integer(),
            'num_number' => $this->string(12)->unique(),
            'num_created' => $this->integer()->notNull()
        ]);

        // add foreign key for table `countries`
        $this->addForeignKey(
            'fk-cnt_id',
            'numbers',
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
        $this->dropTable('{{%numbers}}');
    }
}
