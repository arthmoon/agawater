<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payment}}`.
 */
class m200203_143449_create_payment_table extends Migration
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

        $this->createTable('{{%payment}}', [
            'id'           => $this->primaryKey()->comment('Номер платежа'),
            'abonent_id'   => $this->integer()->comment('Абонент'),
            'sum'          => $this->decimal(16,2)->comment('Сумма'),
            'family_count' => $this->integer()->comment('Состав семьи'),
            'dt'           => $this->dateTime()->comment('Дата платежа'),
            'days'         => $this->integer()->comment('Кол-во дней'),
            'limit'        => $this->integer()->comment('Кол-во литров')
        ]);

        $this->addForeignKey('payment-abonent-fk', 'payment', 'abonent_id', 'abonent', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
//        $this->dropForeignKey('payment-abonent-fk', 'payment');

        $this->dropTable('{{%payment}}');
    }
}
