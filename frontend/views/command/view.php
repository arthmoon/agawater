<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Command */
?>
<div class="command-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'device_id',
            'input',
            'output:ntext',
            'created_at',
            'executed_at',
        ],
    ]) ?>

</div>
