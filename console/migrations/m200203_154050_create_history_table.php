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
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%history}}', [
            'id'          => $this->primaryKey()      ->comment('ID'),
            'abonent_id'  => $this->integer()         ->comment('Абонент'),
            'device_id'   => $this->integer()         ->comment('Станция'),
            'amount'      => $this->integer()         ->comment('Кол-во'),
            'description' => $this->string(255)->comment('Описание'),
            'dt'          => $this->dateTime()        ->comment('Время')
        ], $tableOptions);

        $this->addForeignKey('history-abonent-fk', 'history', 'abonent_id', 'abonent', 'id', 'NO ACTION', 'NO ACTION');
        $this->addForeignKey('history-device-fk', 'history', 'device_id', 'device', 'id', 'NO ACTION', 'NO ACTION');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('history-device-fk', 'history');
        $this->dropForeignKey('history-abonent-fk', 'history');

        $this->dropTable('{{%history}}');
    }
}
