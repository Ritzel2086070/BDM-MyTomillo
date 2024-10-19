<?php

session_start();
const BASE_PATH = __DIR__.'/../';

require BASE_PATH . 'Core' . DIRECTORY_SEPARATOR . 'functions.php'; // Ensure this works

spl_autoload_register(function ($class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    require base_path("{$class}.php");
});

require base_path('bootstrap.php');  // <--- Make sure this runs before routing

$router = new \Core\Router();
$routes = require base_path('routes.php');

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
