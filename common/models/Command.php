<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "command".
 *
 * @property int $id
 * @property int $device_id Device
 * @property string $input Command script
 * @property string $output Command output
 * @property string $created_at Command create time
 * @property string $executed_at Command exec datetime
 *
 * @property Device $device
 */
class Command extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'command';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['device_id'], 'integer'],
            [['output'], 'string'],
            [['created_at', 'executed_at'], 'safe'],
            [['input'], 'string', 'max' => 1000],
            [['device_id'], 'exist', 'skipOnError' => true, 'targetClass' => Device::className(), 'targetAttribute' => ['device_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'          => 'ID',
            'device_id'   => 'Оборудование',
            'input'       => 'Script',
            'output'      => 'Результат',
            'created_at'  => 'Создан',
            'executed_at' => 'Выполнен',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDevice()
    {
        return $this->hasOne(Device::class, ['id' => 'device_id']);
    }

    /**
     * {@inheritdoc}
     * @return CommandQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CommandQuery(get_called_class());
    }
}
