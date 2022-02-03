<?php

define('SITE', [
    'name' => 'RGBComunicacao',
    'description' => 'Teste tecnico',
    'domain' => '',
    'locale' => 'pt_BR',
    'root' => 'http://localhost/public',
    'base_path' => '/public'
]);

define('PATH', [
    'views' => dirname(__DIR__) . '/views',
    'cache' => dirname(__DIR__) . '/cache'
]);

define('DATA_BASE_SETTINGS', [
    'driver' => 'mysql',
    'host' => 'db',
    'database' => '',
    'username' => '',
    'password' => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);