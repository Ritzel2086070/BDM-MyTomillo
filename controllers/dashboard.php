<?php
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$categorias = $db->query("SELECT ID_categoria, nombre, descripcion FROM CATEGORIAS")->get();

view("dashboard.php", [
    'categorias' => $categorias
]);
