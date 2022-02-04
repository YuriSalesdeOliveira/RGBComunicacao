<?php

namespace Source\http\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Post extends Controller
{
    public function posts(Request $request, Response $response)
    {
        // view
    }

    public function show(Request $request, Response $response)
    {
        // view "um post"
    }

    public function create(Request $request, Response $response)
    {
        // view
    }

    public function store(Request $request, Response $response)
    {

    }

    public function edit(Request $request, Response $response)
    {
        // view
    }

    public function update(Request $request, Response $response)
    {

    }

    public function destroy(Request $request, Response $response)
    {

    }
}
