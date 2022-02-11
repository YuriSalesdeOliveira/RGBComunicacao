<?php

namespace Source\http\Controllers;

use Source\Domain\Photo;
use Slim\Routing\RouteContext;
use Source\Domain\Description;
use Source\Support\Uploader\Image;
use Source\Models\Post as ModelsPost;
use YuriOliveira\Validation\Validate;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Source\Support\Helper;

class Post extends Controller
{
    public function posts(Request $request, Response $response)
    {
        
    }

    public function show(Request $request, Response $response, array $args)
    {
        $response->getBody()->write($args['post']);

        return $response;
    }

    public function create(Request $request, Response $response)
    {
        $routeContext = RouteContext::fromRequest($request);
        $routeParser = $routeContext->getRouteParser();

        $content = $this->twig->render('register.html.twig', [
            'route' => $routeParser,
        ]);

        $response->getBody()->write($content);

        return $response;
    }

    public function store(Request $request, Response $response)
    {
        $routeContext = RouteContext::fromRequest($request);
        $routeParser = $routeContext->getRouteParser();

        $data = $request->getParsedBody() + $request->getUploadedFiles();

        $validate =  new Validate($data);

        $validate->validate([
            'description' => ['required']
        ]);

        if ($errors = $validate->errors())
        {
            print_r($errors);

            return $response
                ->withHeader('Location', $routeParser->urlFor('post.create'))
                ->withStatus(303);
        }

        $uploadedPhoto = Helper::uploadFile(PATH['storage'] . '/images', $data['photo']);

        $post = new ModelsPost();
        $post->photo = Photo::parse($uploadedPhoto);
        $post->description = Description::parse($data['description']);

        $post->save();

        return $response
            ->withHeader('Location', $routeParser->urlFor('post.create'))
            ->withStatus(303);
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
