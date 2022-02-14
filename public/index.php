<?php

ob_start();
session_start();

use Slim\Factory\AppFactory;
use Slim\Middleware\MethodOverrideMiddleware;
use Source\http\Controllers\Post;
use Source\http\Controllers\Web;

require_once(dirname(__DIR__) . '/vendor/autoload.php');

$app = AppFactory::create();
$app->addRoutingMiddleware();
$app->add(new MethodOverrideMiddleware);

$app->get('/', [Web::class, 'home'])->setName('web.home');
$app->get('/{page}', [Web::class, 'home'])->setName('web.home.arg');

$app->get('/postagens/{post}/mostrar', [Post::class, 'show'])->setName('post.show');

$app->get('/postagens/criar', [Post::class, 'create'])->setName('post.create');
$app->post('/postagens/registrar', [Post::class, 'store'])->setName('post.store');

$app->get('/postagens/{post}/editar', [Post::class, 'edit'])->setName('post.edit');
$app->put('/postagens/atualizar', [Post::class, 'update'])->setName('post.update');

$app->delete('/postagens/deletar', [Post::class, 'destroy'])->setName('post.destroy');

$app->run();

ob_end_flush();