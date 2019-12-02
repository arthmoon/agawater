<?php

use common\models\User;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */
?>
<div class="user-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            [
                'attribute' => 'fio',
                'label' => 'ФИО',
                'value' => function (User $user) {
                    return "{$user->last_name} {$user->first_name} {$user->father_name}";
                }
            ],
            'position',
            'phone',
            'email:email',
            [
                'attribute' => 'status',
                'value' => function (User $user) {
                    return User::getStatusList()[$user->status];
                }
            ],
            [
                'attribute' => 'role',
                'value' => function (User $user) {
                    return User::getRoleList()[$user->role];
                }
            ],
            [
                'attribute' => 'created_at',
                'value' => function (User $user) {
                    return date("d.m.Y h:m:i", $user->created_at);
                }
            ],
            [
                'attribute' => 'updated_at',
                'value' => function (User $user) {
                    return date("d.m.Y h:m:i", $user->updated_at);
                }
            ],
        ],
    ]) ?>

</div>
