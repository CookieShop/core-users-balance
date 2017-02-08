<?php

$path=  realpath((__DIR__).'/../').'/src/';

return [
    'adteam_core_users_balance'=>[
        'test'=>$path
    ],
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'driverClass' => \Doctrine\DBAL\Driver\PDOMySql\Driver::class,
                'params' => [
                    'charset' => 'utf8',
                ],
            ],
        ],
        'driver' => [
            'Doctrine_driver_users_balance' => [
                'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [
                    0 => $path.'/Entity',
                ],
            ],
            'orm_default' => [
                'drivers' => [
                    'Adteam\\Core\\Users\\Balance' => 'Doctrine_driver_users_balance',
                ],
            ],
        ],
    ]   
];
