<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'controllers/index.php',
    '/about' => 'controllers/about.php',
    '/contact' => 'controllers/contact.php',
    '/notes' => 'controllers/notes.php',
    '/note' => 'controllers/note.php',  
    '/note/create' => 'controllers/note-create.php',
    '/test'=> 'controllers/test.php',
    '/signin'=> 'controllers/user.signin.php',
    '/api'=> 'controllers/api.php',
    '/logout' =>'controllers/logout.php',
    '/jwt' => 'controllers/jwt-test.php'


];

function routeToController($uri, $routes) {
    if (array_key_exists($uri, $routes)) {
        
        require $routes[$uri];
    } else {
        abort();
    }
}

function abort($code = 404) {
    http_response_code($code);

    require "views/{$code}.php";

    die();
}

routeToController($uri, $routes);