<?php
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$generos = $db->query("SELECT ID_genero, genero FROM GENEROS")->get();
$info = $db->query("SELECT nombres, apellido_paterno, apellido_materno, f_nacimiento, correo, ID_genero FROM USUARIOS WHERE ID_usuario = ?", [
    $_SESSION['user']['id']
])->find();
$categorias = $db->query("SELECT ID_categoria, nombre FROM CATEGORIAS")->get();
$n_cursos = $db->query("SELECT COUNT(*) as n_cursos FROM CURSOS WHERE ID_maestro = ?", [
    $_SESSION['user']['id_rol']
])->find();

view("profile/teacher.php",  [
    'generos' => $generos,
    'usuario' => $info,
    'categorias' => $categorias,
    'n_cursos' => $n_cursos['n_cursos']
]);
