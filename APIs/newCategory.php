<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

header('Content-type: application/json');

$json = file_get_contents('php://input');
$body = json_decode($json, true);

$category = $body['category'] ?? null;
$description = $body['description'] ?? null;

if (!$category || !$description) {
    echo json_encode(['message' => 'Faltan campos']);
    exit();
}

try {
    $db->query('CALL sp_update_categoria("agregar", ?,?,?,NULL)', [
        $_SESSION['user']['id_rol'],
        $category,
        $description
    ]);
} catch (PDOException $e) {
    echo json_encode(['message' => 'Error al agregar categoría: ' . $e->getMessage()]);
    exit();
}
echo json_encode(['message' => 'success']);