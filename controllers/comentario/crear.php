<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$comment = $_POST['comment'];
$rating = $_POST['rating'];
$ID_curso = $_POST['ID_curso'];

try {
    $db->query('CALL sp_update_comentarios("agregar", ?,?,NULL,?,?, NULL)', [
        $ID_curso,
        $_SESSION['user']['id_rol'],
        $rating,
        $comment
    ]);
} catch (PDOException $e) {
    $_SESSION['errors'] = "Error al registrar comentario: " . $e->getMessage();
}

require __DIR__ . '/../clase/view.php';
