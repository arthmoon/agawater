<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%abonent}}`.
 */
class m191210_160549_create_abonent_table extends Migration
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

        $this->createTable('{{%abonent}}', [
            'id'           => $this->primaryKey(),
            'uid'          => $this->string(64)->comment('Ключ'),
            'first_name'   => $this->string(255)->comment('Имя'),
            'last_name'    => $this->string(255)->comment('Фамилия'),
            'father_name'  => $this->string(255)->comment('Отчество'),
            'phone'        => $this->string(16)->comment('Телефон'),
            'status'       => $this->smallInteger()->defaultValue(10)->comment('Статус'),
            'family_count' => $this->integer()->comment('Состав семьи'),
            'limit'        => $this->integer()->comment('Лимит'),
            'days'         => $this->integer()->comment('Дней осталось'),
            'payment_dt'   => $this->dateTime()->comment('Дата последнего платежа')
        ], $tableOptions);

        $this->createIndex('abonent-uid', 'abonent', 'uid', false);
        $this->createIndex('abonent-first_name', 'abonent', 'first_name', false);
        $this->createIndex('abonent-last_name', 'abonent', 'last_name', false);
        $this->createIndex('abonent-father_name', 'abonent', 'father_name', false);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('abonent-father_name', 'abonent');
        $this->dropIndex('abonent-last_name', 'abonent');
        $this->dropIndex('abonent-first_name', 'abonent');
        $this->dropIndex('abonent-uid', 'abonent');

        $this->dropTable('{{%abonent}}');
    }
}
