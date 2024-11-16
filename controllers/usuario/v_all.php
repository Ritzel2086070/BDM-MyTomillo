<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

header('Content-type: application/json');

$todos = $db->query("SELECT ID_usuario, nombres, apellido_paterno, apellido_materno FROM usuarios")->get();

echo json_encode($todos);