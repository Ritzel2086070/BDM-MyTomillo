<?php

$router->get('/', 'controllers/index.php');
$router->post('/login', 'controllers/usuario/login.php');
$router->get('/signin', 'controllers/usuario/signin.php');
$router->post('/signin', 'controllers/usuario/registro.php');
$router->get('/dashboard', 'controllers/dashboard.php')->only('auth');
$router->get('/profile', 'controllers/usuario/profile.php')->only('auth');
$router->get('/profile-student', 'controllers/usuario/profile/student.php')->only('auth')->only('student');
$router->get('/profile-teacher', 'controllers/usuario/profile/teacher.php')->only('auth')->only('teacher');
$router->get('/profile-admin', 'controllers/usuario/profile/admin.php')->only('auth')->only('admin');
$router->post('/editProfile', 'controllers/usuario/profile/edit.php')->only('auth');
$router->get('/logout', 'controllers/usuario/logout.php')->only('auth');
$router->post('/changePassword', 'APIs/changePassword.php')->only('auth');
$router->post('/newCategory', 'controllers/categoria/agregar.php')->only('auth')->only('admin');
$router->post('/editCategory', 'controllers/categoria/editar.php')->only('auth')->only('admin');
$router->post('/deleteCategory', 'controllers/categoria/eliminar.php')->only('auth')->only('admin');
$router->post('/unlockUser', 'controllers/usuario/desbloquear.php')->only('auth')->only('admin');
$router->post('/blockedUsers', 'controllers/usuario/v_bloqueados.php')->only('auth')->only('admin');
$router->get('/nuevo_curso', 'controllers/curso/nuevo.php')->only('auth')->only('teacher');
$router->post('/editar_curso', 'controllers/curso/editar.php')->only('auth')->only('teacher');
$router->post('/updateCurso', 'controllers/curso/update.php')->only('auth')->only('teacher');
$router->get('/nueva_clase', 'controllers/clase/nueva.php')->only('auth')->only('teacher');
$router->post('/compress-video', 'APIs/compressVideo.php')->only('auth')->only('teacher');
$router->post('/teacherCursos', 'controllers/curso/v_teacherCursos.php')->only('auth')->only('teacher');
$router->post('/teacherCursosAlumnos', 'controllers/curso/v_teacherCursosAlumnos.php')->only('auth')->only('teacher');
$router->post('/teacherIngresos', 'controllers/curso/v_teacherIngresos.php')->only('auth')->only('teacher');


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