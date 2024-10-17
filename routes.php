<?php

$router->get('/', 'controllers/index.php');
$router->post('/login', 'controllers/login.php');


/*


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


$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

$router->get('/notes', 'controllers/notes/index.php')->only('auth');
$router->get('/note', 'controllers/notes/show.php');
$router->delete('/note', 'controllers/notes/destroy.php');

$router->get('/note/edit', 'controllers/notes/edit.php');
$router->patch('/note', 'controllers/notes/update.php');

$router->get('/notes/create', 'controllers/notes/create.php');
$router->post('/notes', 'controllers/notes/store.php');

$router->get('/register', 'controllers/registration/create.php')->only('guest');
$router->post('/register', 'controllers/registration/store.php');

*/