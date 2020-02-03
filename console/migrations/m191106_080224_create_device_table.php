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
            'id'            => $this->primaryKey(),
            'uid'           => $this->string(100)->comment('UID'),
            'name'          => $this->string(100)->comment('Наименование'),
            'ip'            => $this->string(100)->comment('IP адрес'),
            'last_online'   => $this->dateTime()->comment('Дата связи'),
            'last_sync'     => $this->dateTime()->comment('Дата синхронизации'),
            'status'        => $this->integer()->comment('Статус'),
            'auth_key'      => $this->string(32)->comment('Ключ авторизации'),
            'anydesk_id'    => $this->string(32) ->comment('AnyDesk'),
            'teamviewer_id' => $this->string(32) ->comment('TeamViewer'),
            'params'        => $this->text()->comment('Параметры')
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
