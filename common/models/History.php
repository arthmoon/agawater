<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "history".
 *
 * @property int $id ID
 * @property int|null $abonent_id Абонент
 * @property int|null $device_id Станция
 * @property int|null $amount Кол-во
 * @property string|null $description Описание
 * @property string|null $dt Время
 */
class History extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['abonent_id', 'device_id', 'amount'], 'integer'],
            [['dt'], 'safe'],
            [['description'], 'string', 'max' => 255],
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
            'id'          => 'ID',
            'abonent_id'  => 'Абонент',
            'device_id'   => 'Станция',
            'amount'      => 'Кол-во',
            'description' => 'Описание',
            'dt'          => 'Время',
        ];
    }
}
