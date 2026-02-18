<?php

function dispatch(string $uri, string $method): void
{
   
    $uri = parse_url($uri, PHP_URL_PATH);


    $uri = ltrim($uri, '/');


    if ($uri === '' || $uri === 'index.php') {
        $uri = 'home';
    }

  
    $parts = explode('/', $uri);
    $routeFile = $parts[0];
    $param = $parts[1] ?? null;

    $routePath = ROUTES_DIR . '/' . $routeFile . '.php';

    if (file_exists($routePath)) {
        if ($param) {
          
            $_GET['id'] = $param;
        }
        require_once $routePath;
    } else {
 
        renderView('404');
    }
}
?>
