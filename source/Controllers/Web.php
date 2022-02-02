<?php

namespace Source\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Web
{
    public function home(Request $request, Response $response)
    {
        $body = $response->getBody();
        $body->write('home');

        return $response;
    }
}