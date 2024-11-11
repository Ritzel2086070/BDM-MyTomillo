<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$categorias = $db->query("SELECT ID_categoria, nombre FROM CATEGORIAS")->get();

$ID_curso = $_POST['id'];

$curso = $db->query("SELECT c.ID_curso, c.titulo, cat.nombre, c.ID_categoria, c.precio, c.imagen, c.descripcion, c.n_niveles FROM CURSOS c JOIN CATEGORIAS cat WHERE c.ID_categoria = cat.ID_categoria AND c.ID_curso = ?", [
    $ID_curso])->find();

$aprendizajes = $db->query("SELECT * FROM APRENDIZAJES WHERE ID_curso = ?", [
    $ID_curso
])->get();

$niveles = $db->query("SELECT * FROM NIVELES WHERE ID_curso = ?", [
    $ID_curso
])->get();

$clases = $db->query("SELECT ID_curso, ID_nivel, ID_clase, titulo, descripcion FROM CLASES WHERE ID_curso = ?", [
    $ID_curso
])->get();

view("curso.php", [
    'categorias' => $categorias,
    'title' => 'Editar curso',
    'curso' => $curso,
    'aprendizajes' => $aprendizajes,
    'niveles' => $niveles,
    'clases' => $clases
]);
