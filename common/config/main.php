<?php
return [
    'name' => 'АГА Водоснабжение',
    'language' => 'ru-RU',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'db_reg.ru' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=31.31.196.23;dbname=u0128646_default',
            'username' => 'u0128646_default',
            'password' => '9Bh!4CZr',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'ssl://smtp.yandex.ru',
                'username' => 'arth.moon@ya.ru',
                'password' => 'astana2018',
                'port' => '465',
                'encryption' => 'SSL',
            ],
        ],
    ],
    'modules' => [
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ]
    ]
];
