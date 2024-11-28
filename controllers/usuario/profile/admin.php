<?php
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$generos = $db->query("SELECT ID_genero, genero FROM GENEROS")->get();
$info = $db->query("SELECT nombres, apellido_paterno, apellido_materno, f_nacimiento, correo, ID_genero FROM USUARIOS WHERE ID_usuario = ?", [
    $_SESSION['user']['id']
])->find();
$categorias = $db->query("SELECT ID_categoria, nombre, descripcion, f_registro FROM CATEGORIAS WHERE ID_creador = ?", [
    $_SESSION['user']['id_rol']
])->get();
$estudiantes = $db->query("SELECT * FROM v_estudiantesReportes")->get();
$profesores = $db->query("SELECT * FROM v_profesoresReportes")->get();

view("profile/admin.php",  [
    'generos' => $generos,
    'usuario' => $info,
    'categorias' => $categorias,
    'estudiantes' => $estudiantes,
    'profesores' => $profesores
]);
