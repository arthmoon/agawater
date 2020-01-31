<?php

use common\models\Device;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Device */
?>
<div class="device-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'uid',
            'name',
            'ip',
            'last_online',
            'last_sync',
            [
                'attribute' => 'status',
                'value' => function (Device $device) {
                    return Device::getStatusList()[$device->status];
                }
            ],
            'params:ntext',
        ],
    ]) ?>

</div>
