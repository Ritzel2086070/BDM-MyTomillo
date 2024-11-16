<?php
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
header('Content-type: application/json');
$json = file_get_contents('php://input');
$body = json_decode($json, true);


$mensaje = $body['mensaje'] ?? null;
$chat = $body['ID_chat'] ?? null;


$db->query("INSERT INTO MENSAJES (ID_chat, ID_usuario, mensaje) VALUES (?, ?, ?)", [$chat, $_SESSION['user']['id'], $mensaje]);

echo json_encode(['message' => 'Mensaje enviado']);
