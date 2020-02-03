<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%history}}`.
 */
class m200203_154050_create_history_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%history}}', [
            'id' => $this->primaryKey()->comment('ID'),
            'abonent_id' => $this->integer()->comment('Абонент'),
            'device_id' => $this->integer()->comment('Станция'),
            'amount' => $this->integer()->comment('Кол-во'),
            'description' => $this->string(255)->comment('Описание'),
            'dt' => $this->dateTime()->comment('Время')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%history}}');
    }
}
