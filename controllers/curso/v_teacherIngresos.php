<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

header('Content-type: application/json');

$json = file_get_contents('php://input');
$body = json_decode($json, true);

$tipo = $body['tipo_pago'] ?? null;

if (!$tipo) {
    echo json_encode(['message' => 'Faltan campos']);
    exit();
}

$total = $db->query("SELECT * FROM v_cursosIngresosTotales WHERE ID_maestro = ? AND tipo_pago = ?", [
    $_SESSION['user']['id_rol'],
    $tipo
])->find();

echo json_encode($total);