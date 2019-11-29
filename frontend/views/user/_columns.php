<?php

use common\models\User;
use yii\helpers\Html;
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
    // [
    // 'class'=>'\kartik\grid\DataColumn',
    // 'attribute'=>'id',
    // ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'user_info',
        'label' => 'Информация',
        'value' => function (User $user) {
            return "{$user->username} ($user->phone)<br/>{$user->email}<br/>{$user->last_name} {$user->first_name} {$user->father_name}";
        },
        'format' => 'raw',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'position',
        'label' => 'Должность'
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'role',
        'label' => 'Роль',
        'value' => function (User $user) {
            return \yii\helpers\Html::label(User::getRoleList()[$user->role], 'role', [
                'class' => "label label-info"
            ]);
        },
        'format' => 'raw',
        'filter' => User::getRoleList()
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'status',
        'label' => 'Статус',
        'value' => function (User $user) {
            $class = 'success';
            if ($user->status == User::STATUS_INACTIVE) $class = 'warning';
            if ($user->status == User::STATUS_DELETED) $class = 'danger';
            return \yii\helpers\Html::label(User::getStatusList()[$user->status], 'status', [
                'class' => "label label-$class"
            ]);
        },
        'format' => 'raw',
        'filter' => User::getStatusList()
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'width' => '50',
        'dropdown' => false,
        'vAlign' => 'middle',
        'urlCreator' => function ($action, $model, $key, $index) {
            return Url::to([$action, 'id' => $key]);
        },
        'viewOptions' => ['role' => 'modal-remote', 'title' => 'View', 'data-toggle' => 'tooltip'],
        'updateOptions' => ['role' => 'modal-remote', 'title' => 'Update', 'data-toggle' => 'tooltip'],
//        'deleteOptions' => ['role' => 'modal-remote', 'title' => 'Delete',
//            'data-confirm' => false, 'data-method' => false,// for overide yii data api
//            'data-request-method' => 'post',
//            'data-toggle' => 'tooltip',
//            'data-confirm-title' => 'Are you sure?',
//            'data-confirm-message' => 'Are you sure want to delete this item'],
        'buttons' => [
            'view'      => function ($url, $user) {
                return Html::a(
                    '<span class="glyphicon glyphicon-search"></span>',
                    ['user/view', 'id' => $user->id],
                    ['role' => 'modal-remote', 'data-toggle' => 'tooltip']
                );
            },
            'update'      => function ($url, $user) {
                return Html::a(
                    '<span class="glyphicon glyphicon-edit"></span>',
                    ['user/update', 'id' => $user->id],
                    ['role' => 'modal-remote', 'data-toggle' => 'tooltip']
                );
            },
            'delete' => function ($url, $user) {
                return Html::a(
                    '<span class="glyphicon glyphicon-trash"></span>',
                    ['user/delete', 'id' => $user->id],
                    [
                        'title'        => 'Удалить',
                        'data-confirm' => 'Вы точно хотите удалить?',
                        'data-method'  => 'post',
                        'data-pjax'    => '0',
                    ]
                );
            }
        ]
    ]
];   