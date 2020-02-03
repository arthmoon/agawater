<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property int $id Номер платежа
 * @property int|null $abonent_id Абонент
 * @property float|null $sum Сумма
 * @property int|null $family_count Состав семьи
 * @property string|null $dt Дата платежа
 * @property int|null $days Кло-во дней
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
            [['abonent_id', 'family_count', 'days'], 'integer'],
            [['sum'], 'number'],
            [['dt'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер платежа',
            'abonent_id' => 'Абонент',
            'sum' => 'Сумма',
            'family_count' => 'Состав семьи',
            'dt' => 'Дата платежа',
            'days' => 'Кло-во дней',
        ];
    }
}
