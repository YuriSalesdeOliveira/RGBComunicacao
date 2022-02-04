<?php

namespace Source\http\Controllers;

use Twig\Environment;
use Source\Support\Helper;
use Twig\Loader\FilesystemLoader;

abstract class Controller
{
    protected $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader(PATH['views']);
        $this->twig = new Environment($loader, [
            'cache' => PATH['cache'],
            'debug' => true
        ]);

        $this->twig->addGlobal('helper', new Helper);

    }
}
