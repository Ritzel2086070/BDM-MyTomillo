<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$generos = $db->query("SELECT ID_genero, genero FROM GENEROS")->get();


view("signin.php", [
    'generos' => $generos
]);
