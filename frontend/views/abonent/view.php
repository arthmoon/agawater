<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Abonent */
?>
<div class="abonent-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'first_name',
            'last_name',
            'father_name',
            'phone',
            'status',
            'limit',
        ],
    ]) ?>

</div>
