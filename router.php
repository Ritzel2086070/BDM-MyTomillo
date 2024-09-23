<?php
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/' => 'controllers/index.php',
    '/signin' => 'controllers/signin.php',
    '/login' => 'controllers/login.php',
    '/dashboard' => 'controllers/dashboard.php',
    '/carrito' => 'controllers/carrito.php',
    '/mensajes' => 'controllers/mensajes.php',
    '/profile' => 'controllers/profile.php',
    '/pay' => 'controllers/pay.php',
    '/class' => 'controllers/class.php',
    '/lesson' => 'controllers/lesson.php',
    '/nuevo_curso' => 'controllers/nuevo_curso.php',
    '/editar_curso' => 'controllers/editar_curso.php',
    '/nueva_clase' => 'controllers/nueva_clase.php',
];

function abort($code = 404) {
    http_response_code($code);
    require "views/$code.php";
    die();
}

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    abort();
}