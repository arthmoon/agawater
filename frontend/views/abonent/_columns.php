<?php

use yii\helpers\Url;
use common\models\Abonent;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],/*
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'id',
    ],*/
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'fio',
        'label' => 'ФИО',
        'value' => function (Abonent $abonent) {
            return "{$abonent->last_name} {$abonent->first_name} {$abonent->father_name}";
        }
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'uid',
        'value' => function (Abonent $abonent) {
            return mb_strtoupper($abonent->uid);
        }
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'phone',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'limit',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'days',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'payment_dt',
    ],
    [
        'class' => '\kartik\grid\DataColumn',
        'attribute' => 'status',
        'value' => function (Abonent $abonent) {
            $class = 'success';
            if ($abonent->status == Abonent::STATUS_INACTIVE) $class = 'warning';
            if ($abonent->status == Abonent::STATUS_DELETED) $class = 'danger';
            return \yii\helpers\Html::label(Abonent::getStatusList()[$abonent->status], 'status', [
                'class' => "label label-$class"
            ]);
        },
        'format' => 'raw',
        'filter' => Abonent::getStatusList()
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign' => 'middle',
        'urlCreator' => function ($action, $model, $key, $index) {
            return Url::to([$action, 'id' => $key]);
        },
        'viewOptions' => ['role' => 'modal-remote', 'title' => 'View', 'data-toggle' => 'tooltip'],
        'updateOptions' => ['role' => 'modal-remote', 'title' => 'Update', 'data-toggle' => 'tooltip'],
        'deleteOptions' => ['role' => 'modal-remote', 'title' => 'Delete',
            'data-confirm' => false,
            'data-method' => false, // for overide yii data api
            'data-request-method' => 'post',
            'data-toggle' => 'tooltip',
            'data-confirm-title' => 'Are you sure?',
            'data-confirm-message' => 'Are you sure want to delete this item'
        ],
    ],
];   