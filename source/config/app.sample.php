<?php

define('SITE', [
    'name' => 'RGBComunicacao',
    'description' => 'Teste tecnico',
    'domain' => '',
    'locale' => 'pt_BR',
    'root' => 'http://localhost/public',
]);

define('PATH', [
    'views' => dirname(__DIR__) . '/views',
    'cache' => dirname(__DIR__) . '/cache',
    'config' => dirname(__DIR__) . '/config',
    'storage' => dirname(__DIR__) . '/storage'
]);

define('DATA_BASE_SETTINGS', [
    'driver' => 'mysql',
    'host' => 'db',
    'port' => '3306',
    'database' => 'rgb_comunicacao',
    'username' => 'root',
    'password' => 'root',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);