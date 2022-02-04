<?php

namespace Source\http\Controllers;

use Source\Models\Post;
use Source\Support\Paginator;
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

        $content = $this->twig->render('home.html.twig');

        $body = $response->getBody();
        $body->write($content);

        return $response;
    }
}
