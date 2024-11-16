<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

header('Content-type: application/json');

$json = file_get_contents('php://input');
$body = json_decode($json, true);

$destinatario = $body['ID_usuario'] ?? null;

if (!$destinatario) {
    echo json_encode(['message' => 'Faltan campos']);
    exit();
}

$db->query("INSERT INTO CHATS (ID_usuario1, ID_usuario2) VALUES (?, ?)", [$destinatario, $_SESSION['user']['id']]);

echo json_encode(['message' => 'Chat creado']);