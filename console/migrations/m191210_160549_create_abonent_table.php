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
            'id'          => $this->primaryKey(),
            'first_name'  => $this->string(255),
            'last_name'   => $this->string(255),
            'father_name' => $this->string(255),
            'phone'       => $this->string(16)->notNull()->unique(),
            'status'      => $this->smallInteger()->defaultValue(10),
            'limit'       => $this->integer()
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%abonent}}');
    }
}
