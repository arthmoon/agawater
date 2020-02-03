<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "abonent".
 *
 * @property int $id
 * @property string|null $uid
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $father_name
 * @property string $phone
 * @property int|null $status
 * @property int|null $limit
 * @property int|null $days
 * @property string|null $payment_dt
 */
class Abonent extends \yii\db\ActiveRecord
{
    const STATUS_DELETED  = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE   = 10;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'abonent';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'limit', 'days'], 'integer'],
            [['first_name', 'last_name', 'father_name'], 'string', 'max' => 255],
            [['payment_dt'], 'string'],
            [['phone'], 'string', 'max' => 16],
            [['uid'], 'string', 'max' => 64]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'          => 'ID',
            'first_name'  => 'Имя',
            'last_name'   => 'Фамилия',
            'father_name' => 'Отчество',
            'phone'       => 'Телефон',
            'status'      => 'Статус',
            'limit'       => 'Лимит',
            'uid'         => 'Ключ',
            'days'        => 'Дней осталось',
            'payment_dt'  => 'Дата последнего платежа',
        ];
    }

    /**
     * @return array
     */
    public static function getStatusList()
    {
        return [
            self::STATUS_DELETED  => 'Удален',
            self::STATUS_INACTIVE => 'Заблокирован',
            self::STATUS_ACTIVE   => 'Активный',
        ];
    }
}
