<?php

namespace Source\http\Controllers;

use Source\Support\Helper;
use Slim\Routing\RouteContext;
use Source\ValueObjects\Photo;
use Source\ValueObjects\Description;
use Source\Models\Post as ModelsPost;
use YuriOliveira\Validation\Validate;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Source\Support\Flash;

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
            'photo' => ['requiredUploadedFile'],
            'description' => ['required']
        ]);

        if ($errors = $validate->errors())
        {
            Flash::add($errors);

            return $response
                ->withHeader('Location', $routeParser->urlFor('post.create'))
                ->withStatus(303);
        }
        
        $uploadedPhoto = Helper::uploadFile(PATH['storage'] . '/images', $data['photo']);

        $post = new ModelsPost();
        $post->photo = Photo::parse($uploadedPhoto);
        $post->description = Description::parse($data['description']);

        if ($post->save()) { Flash::add(['register' => 'Postagem adicionada.'], 'success'); }

        return $response
            ->withHeader('Location', $routeParser->urlFor('post.create'))
            ->withStatus(303);
    }

    public function edit(Request $request, Response $response, array $args)
    {
        $routeContext = RouteContext::fromRequest($request);
        $routeParser = $routeContext->getRouteParser();

        $post = ModelsPost::find($args['post']);

        if (!$post)
        {
            Flash::add(['update' => 'Postagem não foi encontrada.']);
        }

        $content = $this->twig->render('update.html.twig', [
            'route' => $routeParser,
            'post' => $post
        ]);

        $response->getBody()->write($content);

        return $response;
    }

    public function update(Request $request, Response $response)
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
            Flash::add($errors);
            print_r($data['id']);
            return $response
                ->withHeader('Location', $routeParser->urlFor('post.edit', ['post' => $data['id']]))
                ->withStatus(303);
        }
        
        $post = ModelsPost::find($data['id']);
        
        if (!$post)
        {
            Flash::add(['update' => 'Postagem não foi encontrada.']);

            return $response
                ->withHeader('Location', $routeParser->urlFor('post.edit', ['post' => '0']))
                ->withStatus(303);
        }

        if ($data['photo']->getSize() !== 0)
        {
            $uploadedPhoto = Helper::uploadFile(PATH['storage'] . '/images', $data['photo']);

            $post->photo = Photo::parse($uploadedPhoto);
        }

        $post->description = Description::parse($data['description']);

        if ($post->save()) { Flash::add(['update' => 'Postagem atualizada'], 'success'); }

        return $response
            ->withHeader('Location', $routeParser->urlFor('post.edit', ['post' => $data['id']]))
            ->withStatus(303);
    }

    public function destroy(Request $request, Response $response)
    {
        $routeContext = RouteContext::fromRequest($request);
        $routeParser = $routeContext->getRouteParser();

        $data = $request->getParsedBody();

        $post = ModelsPost::find($data['id']);
        $post->delete();

        return $response
            ->withHeader('Location',
                $routeParser->urlFor('post.show'), ['post' => $data['id']])
            ->withStatus(303);
    }
}
