<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%device}}`.
 */
class m191106_080224_create_device_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%device}}', [
            'id'          => $this->primaryKey(),
            'uid'         => $this->string(100)->comment('Device Id'),
            'name'        => $this->string(100)->comment('Device Name'),
            'ip'          => $this->string(100)->comment('Internal Ip'),
            'last_online' => $this->dateTime()->comment('Last Online'),
            'status'      => $this->integer()->comment('Status')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%device}}');
    }
}