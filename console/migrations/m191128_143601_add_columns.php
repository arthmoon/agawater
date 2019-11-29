<?php

use yii\db\Migration;

/**
 * Class m191128_143601_add_columns
 */
class m191128_143601_add_columns extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('device', 'params', $this->text());
        $this->addColumn('user', 'position', $this->string(250));
        $this->addColumn('user', 'role', $this->integer());
        $this->addColumn('user', 'first_name', $this->string(250));
        $this->addColumn('user', 'last_name', $this->string(250));
        $this->addColumn('user', 'father_name', $this->string(250));
        $this->addColumn('user', 'phone', $this->string(250));
        $this->addColumn('user', 'image', $this->string(500));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('device', 'params');
        $this->dropColumn('user', 'position');
        $this->dropColumn('user', 'role');
        $this->dropColumn('user', 'first_name');
        $this->dropColumn('user', 'last_name');
        $this->dropColumn('user', 'father_name');
        $this->dropColumn('user', 'phone');
        $this->dropColumn('user', 'image');
    }

}
