<?php
namespace App\Http\Controllers;

use App\Providers\View;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class TodoController {
    
    /**
     * Index Action
     * --> show all todo's
     */
    public static function index(Request $request, Response $response, $args) {
        $category = $request->getAttribute('category');
    
        // get view
        $view = View::display('layouts/main.php', [
            'category' => $category
        ]);

        // return view, via controller action
        $response->getBody()->write($view);
        return $response;
    }
}