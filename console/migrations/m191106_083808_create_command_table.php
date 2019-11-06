<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%command}}`.
 */
class m191106_083808_create_command_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%command}}', [
            'id' => $this->primaryKey(),
            'device_id' => $this->integer()->comment('Device'),
            'input' => $this->string(1000)->comment('Command script'),
            'output' => $this->text()->comment('Command output'),
            'created_at' => $this->dateTime()->comment('Command create time'),
            'executed_at' => $this->dateTime()->comment('Command exec datetime')
        ]);

        $this->addForeignKey('fk-command-device_id', 'command', 'device_id', 'device', 'id', 'CASCADE' ,'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-command-device_id', 'command');
        $this->dropTable('{{%command}}');
    }
}
