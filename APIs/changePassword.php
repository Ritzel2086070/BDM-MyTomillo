<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

header('Content-type: application/json');

$json = file_get_contents('php://input');
$body = json_decode($json, true);

$password = $body['password'] ?? null;
$newPassword = $body['newPassword'] ?? null;

if (!$password || !$newPassword) {
    echo json_encode(['message' => 'Faltan campos']);
    exit();
}

$valid = $db->query('SELECT ID_usuario FROM USUARIOS WHERE ID_usuario = ? AND contrasena_hash = SHA2(?,256)', [
    $_SESSION['user']['id'], 
    $password
])->find();

if (!$valid) {
    echo json_encode(['message' => 'Contraseña incorrecta']);
    exit();
}


if (!$valid) {
    echo json_encode(['message' => 'Contraseña incorrecta']);
    exit();
} else {
    try {
        $db->query('CALL sp_update_usuarios("contrasena", NULL,NULL,NULL,NULL,NULL,?,NULL,NULL,NULL,?)', [
            $newPassword,
            $_SESSION['user']['id'] 
        ]);
    } catch (PDOException $e) {
        echo json_encode(['message' => 'Error al cambiar contraseña: ' . $e->getMessage()]);
        exit();
    }   
}
echo json_encode(['message' => 'success']);