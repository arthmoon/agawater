<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id'                   => $this->primaryKey(),
            'username'             => $this->string(255),
            'position'             => $this->string(250),
            'role'                 => $this->integer()->defaultValue(1),
            'first_name'           => $this->string(250),
            'last_name'            => $this->string(250),
            'father_name'          => $this->string(250),
            'phone'                => $this->string(16)->notNull()->unique(),
            'image'                => $this->string(500),
            'auth_key'             => $this->string(32),
            'password_hash'        => $this->string(255)->notNull(),
            'password_reset_token' => $this->string(255),
            'verification_token'   => $this->string(255)->defaultValue(null),
            'email'                => $this->string(255),
            'status'               => $this->smallInteger()->defaultValue(10),
            'created_at'           => $this->dateTime(),
            'updated_at'           => $this->dateTime(),
        ], $tableOptions);

        $this->insert('user', [
            'id'                   => 1,
            'username'             => 'agawater',
            'position'             => 'Admin',
            'role'                 => 10,
            'first_name'           => 'Damba',
            'last_name'            => 'Rinchintsyngeev',
            'father_name'          => 'Munkoevich',
            'phone'                => '9644741818',
            'image'                => null,
            'auth_key'             => 'IedyKtowshWNJVAzIISsyehZvSWNow68',
            'password_hash'        => '$2y$13$PvR2SjJQXtJEq6N3O9NaC.Ih03dfX1AwnEaA',
            'password_reset_token' => null,
            'verification_token'   => null,
            'email'                => 'dm.rinch@gmail.com',
            'status'               => 10,
            'created_at'           => '2019-12-03 16:09:05',
            'updated_at'           => '2019-12-03 16:09:05',
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
