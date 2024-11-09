<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$categorias = $db->query("SELECT ID_categoria, nombre FROM CATEGORIAS")->get();

$ID_curso = $_POST['id'];

$curso = $db->query("SELECT * FROM CURSOS WHERE ID_curso = ?", [$ID_curso])->find();

view("curso.php", [
    'categorias' => $categorias,
    'title' => 'Editar curso',
    'curso' => $curso
]);
