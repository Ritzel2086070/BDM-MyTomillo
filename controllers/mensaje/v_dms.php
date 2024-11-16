<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

header('Content-type: application/json');

$currentUser = $_SESSION['user']['id'];

$chatData = $db->query("
SELECT
    c.ID_chat,
    CASE
        WHEN c.ID_usuario1 = ? THEN CONCAT(u2.nombres, ' ', u2.apellido_paterno, ' ', u2.apellido_materno)
        ELSE CONCAT(u1.nombres, ' ', u1.apellido_paterno, ' ', u1.apellido_materno)
    END AS name,
    CASE
        WHEN c.ID_usuario1 = ? THEN u2.ID_usuario
        ELSE u1.ID_usuario
    END AS ID_usuario,
    m.mensaje AS lastMessage
FROM CHATS c
JOIN USUARIOS u1 ON u1.ID_usuario = c.ID_usuario1
JOIN USUARIOS u2 ON u2.ID_usuario = c.ID_usuario2
LEFT JOIN (
    SELECT ID_chat, mensaje
    FROM MENSAJES
    WHERE ID_mensaje IN (
        SELECT MAX(ID_mensaje)
        FROM MENSAJES
        GROUP BY ID_chat
    )
) m ON m.ID_chat = c.ID_chat
WHERE (c.ID_usuario1 = ? OR c.ID_usuario2 = ?);
", [$currentUser, $currentUser, $currentUser, $currentUser])->get();


echo json_encode($chatData);
