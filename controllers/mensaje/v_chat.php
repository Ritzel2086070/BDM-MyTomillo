<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

header('Content-type: application/json');

$json = file_get_contents('php://input');
$body = json_decode($json, true);

$chatID = $body['ID_chat'] ?? null;

if (!$chatID) {
    echo json_encode(['message' => 'Faltan campos']);
    exit();
}

$messages = $db->query("SELECT m.ID_chat, m.ID_usuario, m.mensaje, m.f_envio, u.nombres, u.apellido_paterno, u.apellido_materno FROM MENSAJES m JOIN USUARIOS u ON m.ID_usuario = u.ID_usuario WHERE ID_chat = ?", [$chatID])->get();

echo json_encode($messages);