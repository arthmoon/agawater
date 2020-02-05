<?php

namespace console\controllers;

use common\models\Abonent;
use common\models\Device;
use common\models\Payment;
use Yii;
use yii\console\Controller;
use yii\db\Connection;
use yii\helpers\Console;
use yii\helpers\Json;

class ConsoleController extends Controller
{
    /**
     * @throws \yii\base\InvalidConfigException
     * @throws \yii\db\Exception
     * @throws \yii\base\Exception
     */
    public function actionSync()
    {
        $db_reg_ru = Yii::$app->get('db_reg.ru');
        /** @var Connection $db_reg_ru */
        $stations = $db_reg_ru->createCommand("select * from _wtr_stations")->queryAll();
        $count = count($stations);
        Device::deleteAll();
        $i      = 0;
        $errors = [];
        Console::startProgress(0, $count, 'sync devices: ');
        foreach ($stations as $station) {
            $i++;
            $device            = new Device();
            $device->id        = $station['id'];
            $device->auth_key  = Yii::$app->security->generateRandomString();
            $device->last_sync = $station['sync'];
            $device->name      = $station['addr'];
            $device->status    = Device::STATUS_ON;
            if (!$device->save()) {
                $errors[] = $device->errors;
            }
            Console::updateProgress($i, $count);
        }

        Console::endProgress();

        if (count($errors) > 0) {
            $this->stdout(Json::encode($errors), Console::FG_RED);
        } else {
            $this->stdout("SUCCESS! sync {$count} devices", Console::FG_GREEN);
        }
        $this->stdout(PHP_EOL);

        /** Sync abonents */
        $abonents = $db_reg_ru->createCommand("select * from _wtr_accounts")->queryAll();
        $count = count($abonents);
        Abonent::deleteAll();
        $i      = 0;
        $errors = [];
        Console::startProgress(0, $count, 'sync abonents: ');
        foreach ($abonents as $abonent) {
            $i++;
            $abonentModel = new Abonent();
            $abonentModel->id          = $abonent['id'];
            $abonentModel->first_name  = $abonent['name'];
            $abonentModel->last_name   = $abonent['family'];
            $abonentModel->father_name = $abonent['sname'];
            $abonentModel->uid         = $abonent['btnid'];
            if ($abonent['q'] > 0) {
                $abonentModel->limit   = $abonent['q'];
                $history = $db_reg_ru
                    ->createCommand(
                        "select * from _wtr_history where descr = 'Установка баланса' and acc_id = {$abonent['id']} 
                             order by id desc limit 1"
                    )
                    ->queryOne();

                if (!empty($history)) {
                    $payment             = new Payment();
                    $payment->abonent_id = $abonent['id'];

                    $expiration_dt       = \DateTime::createFromFormat('Y-m-d H:i:s', $history['dt']);
                    $expiration_dt->add(new \DateInterval("P{$history['d']}D"));

                    $payment->days       = (int)$expiration_dt->diff(new \DateTime())->format("%d");
                    $payment->limit      = $abonent['q'];
                    $payment->save(false);

                    $abonentModel->days       = $payment->days;
                    $abonentModel->payment_dt = date("Y-m-d H:i:s");
                }
            } else {
                $abonentModel->limit = 0;
            }

            if (!$abonentModel->save()) {
                $errors[] = $abonentModel->errors;
            }
            Console::updateProgress($i, $count);
        }

        Console::endProgress();

        if (count($errors) > 0) {
            $this->stdout(Json::encode($errors), Console::FG_RED);
        } else {
            $this->stdout("SUCCESS! sync {$count} abonents", Console::FG_GREEN);
        }

        $this->stdout(PHP_EOL);
    }
}
