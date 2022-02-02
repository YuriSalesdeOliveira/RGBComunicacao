<?php

use Source\Controllers\Web;
use Slim\Factory\AppFactory;

require_once(dirname(__DIR__) . '/vendor/autoload.php');

$app = AppFactory::create();

$app->setBasePath('/public');

$app->get('/', [Web::class, 'home'])->setName('web.home');

$app->run();