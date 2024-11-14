<?php
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$generos = $db->query("SELECT ID_genero, genero FROM GENEROS")->get();
$info = $db->query("SELECT nombres, apellido_paterno, apellido_materno, f_nacimiento, correo, ID_genero FROM USUARIOS WHERE ID_usuario = ?", [
    $_SESSION['user']['id']
])->find();
$categorias = $db->query("SELECT ID_categoria, nombre FROM CATEGORIAS")->get();
$cursosInscritos = $db->query("SELECT COUNT(*) as n_cursos FROM ESTUDIANTES_CURSOS WHERE ID_estudiante = ?", [
    $_SESSION['user']['id_rol']
])->find();
$cursosTerminados = $db->query("SELECT COUNT(*) as n_cursos FROM ESTUDIANTES_CURSOS WHERE ID_estudiante = ? AND estatus = 1", [
    $_SESSION['user']['id_rol']
])->find();

view("profile/student.php",  [
    'generos' => $generos,
    'usuario' => $info,
    'categorias' => $categorias,
    'cursosInscritos' => $cursosInscritos['n_cursos'],
    'cursosTerminados' => $cursosTerminados['n_cursos']
]);
