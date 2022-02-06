<?php

use Slim\Factory\AppFactory;
use Source\http\Controllers\Post;
use Source\http\Controllers\Web;

require_once(dirname(__DIR__) . '/vendor/autoload.php');

$app = AppFactory::create();

$app->get('/', [Web::class, 'home'])->setName('web.home');
$app->get('/{page}', [Web::class, 'home'])->setName('web.home.arg');

$app->get('/postagens', [Post::class, 'posts'])->setName('post.posts');
$app->get('/postagens/{post}', [Post::class, 'show'])->setName('post.show');

$app->get('/postagens/criar', [Post::class, 'create'])->setName('post.create');
$app->post('/postagens', [Post::class, 'store'])->setName('post.store');

$app->get('/postagens/{post}/editar', [Post::class, 'edit'])->setName('post.edit');
$app->put('/postagens/{post}', [Post::class, 'update'])->setName('post.update');

$app->delete('/postagens/{post}', [Post::class, 'destroy'])->setName('post.destroy');

$app->run();
