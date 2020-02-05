<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "payment".
 *
 * @property int $id Номер платежа
 * @property int|null $abonent_id Абонент
 * @property float|null $sum Сумма
 * @property int|null $family_count Состав семьи
 * @property string|null $dt Дата платежа
 * @property int|null $days Кол-во дней
 * @property int|null $limit Кол-во литров
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['abonent_id', 'family_count', 'days', 'limit'], 'integer'],
            [['sum'], 'number'],
            [['dt'], 'safe'],
        ];
    }

    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['dt']
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'           => 'Номер платежа',
            'abonent_id'   => 'Абонент',
            'sum'          => 'Сумма',
            'family_count' => 'Состав семьи',
            'dt'           => 'Дата платежа',
            'days'         => 'Кол-во дней',
            'limit'        => 'Кол-во литров'
        ];
    }
}
