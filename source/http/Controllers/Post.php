<?php

namespace Source\http\Controllers;

use Source\Domain\Classes\Photo;
use Source\Models\Post as ModelsPost;
use Source\Domain\Classes\Description;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Post extends Controller
{
    public function posts(Request $request, Response $response)
    {
        
    }

    public function show(Request $request, Response $response)
    {
        $response->getBody()->write('Post');

        return $response;
    }

    public function create(Request $request, Response $response)
    {
        // view
    }

    public function store(Request $request, Response $response)
    {
        $post = new ModelsPost();
        $post->photo = Photo::parse([]);
        $post->description = Description::parse('Nome do Álbum Lorem Ipsum Dolor Amed');
        $post->save();
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
