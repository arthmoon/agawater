<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Device */
?>
<div class="device-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'uid',
            'name',
            'ip',
            'last_online',
            'last_sync',
            'status',
            'params:ntext',
        ],
    ]) ?>

</div>
