<?php

use Slim\Factory\AppFactory;
use Source\http\Controllers\Web;

require_once(dirname(__DIR__) . '/vendor/autoload.php');

$app = AppFactory::create();

$app->get('/', [Web::class, 'home'])->setName('web.home');
$app->get('/{page}', [Web::class, 'home'])->setName('web.home.arg');

$app->run();