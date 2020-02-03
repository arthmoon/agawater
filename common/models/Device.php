<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "device".
 *
 * @property int $id
 * @property string $uid UID
 * @property string $name Наименование
 * @property string $ip IP адрес
 * @property string $auth_key Ключ авторизации
 * @property string $last_online Дата связи
 * @property string $last_sync Дата синхронизации
 * @property int $status Status
 * @property string $params Параметры
 * @property string $anydesk_id AnyDesk
 * @property string $teamviewer_id TeamViewer
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
            [['auth_key', 'anydesk_id', 'teamviewer_id'], 'string', 'max' => 32],
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
            'id'            => 'ID',
            'uid'           => 'Идентификатор',
            'auth_key'      => 'Ключ авторизации',
            'name'          => 'Наименование',
            'ip'            => 'IP адрес',
            'last_online'   => 'Онлайн',
            'last_sync'     => 'Синхронизация',
            'status'        => 'Статус',
            'params'        => 'Параметры',
            'anydesk_id'    => 'AnyDesk',
            'teamviewer_id' => 'TeamViewer'
        ];
    }

    /**
     * @return array
     */
    public static function getStatusList()
    {
        return [
            self::STATUS_ON  => 'Активен',
            self::STATUS_OFF => 'Отключен'
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
