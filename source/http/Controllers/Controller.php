<?php

namespace Source\http\Controllers;

abstract class Controller
{
    protected $twig;

    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader(PATH['views']);
        $this->twig = new \Twig\Environment($loader, [
            'cache' => PATH['cache'],
            'debug' => true
        ]);
    }
}