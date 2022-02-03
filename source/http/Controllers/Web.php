<?php

namespace Source\http\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Web extends Controller
{
    public function home(Request $request, Response $response)
    {
        $content = $this->twig->render('home.php');

        $body = $response->getBody();
        $body->write($content);

        return $response;
    }
}
