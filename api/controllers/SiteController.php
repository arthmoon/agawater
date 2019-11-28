<?php
namespace api\controllers;

use common\models\Device;
use Yii;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\QueryParamAuth;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $enableCsrfValidation = false;

    public function init()
    {
        parent::init();
        Yii::$app->user->enableSession = false;
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CompositeAuth::class,
            'authMethods' => [
                HttpBasicAuth::class,
                HttpBearerAuth::class,
                QueryParamAuth::class,
            ],
            'except'      => ['index'],
        ];
        return $behaviors;
    }

    /**
     * @return array
     */
    public function actionIndex()
    {
        return [
            'action' => 'index',
            'params' => 123
        ];
    }

    /**
     * @return bool
     */
    public function actionPing()
    {
        $request = Yii::$app->request->rawBody;
        $device = Device::find()->where(['uid' => $request['uid']]);
        if (!$device) {
            $device         = new Device();
            $device->status = Device::STATUS_ON;
        }
        $device->name        = $request['name'];
        $device->ip          = $request['ip'];
        $device->last_online = date('Y-m-d h:i:s');
        return $device->save(false);
    }
}
