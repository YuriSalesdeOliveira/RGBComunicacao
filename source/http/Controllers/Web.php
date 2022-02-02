<?php

namespace Source\http\Controllers;

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

/**
 * 
 * GET	        /photos/create	        create	    photos.create   x
 * POST	        /photos	                store	    photos.store
 * GET	        /photos/{photo}	        show	    photos.show
 * GET	        /photos/{photo}/edit	edit	    photos.edit     x
 * PUT/PATCH	/photos/{photo}	        update	    photos.update
 * DELETE	    /photos/{photo}	        destroy	    photos.destroy
 * 
 */