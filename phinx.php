<?php

return
[
    'paths' => [
        'migrations' => 'source/dataBase/Migrations',
        'seeds' => 'source/dataBase/Seeds'
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => 'development',
        'production' => [
            'adapter' => 'mysql',
            'host' => 'localhost',
            'name' => 'production_db',
            'user' => 'root',
            'pass' => '',
            'port' => '3306',
            'charset' => 'utf8',
        ],
        'development' => [
            'adapter' => DATA_BASE_SETTINGS['driver'],
            'host' => DATA_BASE_SETTINGS['host'],
            'name' => DATA_BASE_SETTINGS['database'],
            'user' => DATA_BASE_SETTINGS['username'],
            'pass' =>DATA_BASE_SETTINGS['password'],
            'port' => DATA_BASE_SETTINGS['port'],
            'charset' => DATA_BASE_SETTINGS['charset'],
        ],
        'testing' => [
            'adapter' => 'mysql',
            'host' => 'localhost',
            'name' => 'testing_db',
            'user' => 'root',
            'pass' => '',
            'port' => '3306',
            'charset' => 'utf8',
        ]
    ],
    'version_order' => 'creation'
];
