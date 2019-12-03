<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "device".
 *
 * @property int $id
 * @property string $uid Device Id
 * @property string $name Device Name
 * @property string $ip Internal Ip
 * @property string $last_online Last Online
 * @property string $last_sync Last Sync
 * @property int $status Status
 * @property string $params Params
 *
 * @property Command[] $commands
 */
class Device extends \yii\db\ActiveRecord
{
    const STATUS_ON  = 1;
    const STATUS_OFF = 2;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'device';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['last_online', 'last_sync'], 'safe'],
            [['status'], 'integer'],
            [['uid', 'name', 'ip'], 'string', 'max' => 100],
            [['params'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id'          => 'ID',
            'uid'         => 'Идентификатор',
            'name'        => 'Наименование',
            'ip'          => 'IP адрес',
            'last_online' => 'Онлайн',
            'last_sync'   => 'Синхронизация',
            'status'      => 'Статус',
            'params'      => 'Параметры',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCommands()
    {
        return $this->hasMany(Command::class, ['device_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return DeviceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DeviceQuery(get_called_class());
    }
}
