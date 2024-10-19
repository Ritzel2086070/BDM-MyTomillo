<?php
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$generos = $db->query("SELECT ID_genero, genero FROM GENEROS")->get();
$info = $db->query("SELECT nombres, apellido_paterno, apellido_materno, f_nacimiento, correo, ID_genero FROM USUARIOS WHERE ID_usuario = ?", [
    $_SESSION['user']['id']
])->find();

view("profile/admin.php",  [
    'generos' => $generos,
    'usuario' => $info
]);
