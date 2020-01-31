<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "abonent".
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $father_name
 * @property string $phone
 * @property int|null $status
 * @property int|null $limit
 */
class Abonent extends \yii\db\ActiveRecord
{
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
            [['phone'], 'required'],
            [['status', 'limit'], 'integer'],
            [['first_name', 'last_name', 'father_name'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 16],
            [['phone'], 'unique'],
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
        ];
    }
}
