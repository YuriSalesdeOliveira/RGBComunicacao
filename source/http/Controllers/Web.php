<?php

namespace Source\http\Controllers;

use Source\Models\Post;
use Source\Support\Paginator;
use Slim\Routing\RouteContext;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Web extends Controller
{
    public function home(Request $request, Response $response, array $args)
    {
        $args = filter_var_array($args, FILTER_SANITIZE_STRIPPED);

        $current_page = empty($args['page']) ? 1 : $args['page'];

        $paginator = new Paginator(Post::count(), 20, $current_page);
        
        $posts = Post::skip($paginator->offset())->take($paginator->limit())->get();

        $routeContext = RouteContext::fromRequest($request);
        $routeParser = $routeContext->getRouteParser();

        $content = $this->twig->render('home.html.twig', [
            'posts' => $posts,
            'pages_details' => $paginator->pagesDetails(),
            'route' => $routeParser,
            'current_page' => $current_page
        ]);

        $response->getBody()->write($content);

        return $response;
    }
}
