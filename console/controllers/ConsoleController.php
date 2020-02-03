<?php

namespace console\controllers;

use common\models\Abonent;
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
     */
    public function actionSyncAbonents()
    {
        $db_reg_ru = Yii::$app->get('db_reg.ru');
        /** @var Connection $db_reg_ru */
        $abonents = $db_reg_ru->createCommand("select * from _wtr_accounts")->queryAll();
        $count = count($abonents);
        Abonent::deleteAll();

        Console::startProgress(0, $count, 'sync abonents: ');
        $i      = 0;
        $errors = [];
        foreach ($abonents as $abonent) {
            $i++;
            $abonentModel = new Abonent();
            $abonentModel->id          = $abonent['id'];
            $abonentModel->first_name  = $abonent['name'];
            $abonentModel->last_name   = $abonent['family'];
            $abonentModel->father_name = $abonent['sname'];
            $abonentModel->uid         = $abonent['btnid'];
            $abonentModel->limit       = $abonent['q'];
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
