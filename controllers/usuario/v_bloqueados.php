<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

header('Content-type: application/json');

$json = file_get_contents('php://input');
$body = json_decode($json, true);

$order = $body['orderBy'] ?? null;

if (!$order) {
    echo json_encode(['message' => 'Faltan campos']);
    exit();
}

if ($order == "nombre") {
    $bloqueados = $db->query("SELECT * FROM v_usuariosBloqueadosPorNombre")->get();
} else if ($order == "fecha") {
    $bloqueados = $db->query("SELECT * from v_usuariosBloqueadosPorFecha")->get();
} else {
    echo json_encode(['message' => 'Orden no válido']);
    exit();
}

echo json_encode($bloqueados);