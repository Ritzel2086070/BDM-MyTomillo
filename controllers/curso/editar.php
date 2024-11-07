<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$categorias = $db->query("SELECT ID_categoria, nombre FROM CATEGORIAS")->get();

view("curso.php", [
    'categorias' => $categorias,
    'title' => 'Editar curso'
]);
