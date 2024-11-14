<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$ID_curso = $_POST['ID_curso'];
$ID_comentario = $_POST['ID_comentario'];

try {
    $db->query('CALL sp_update_comentarios("eliminar", NULL,NULL,NULL,NULL,NULL, ?)', [
        $ID_comentario
    ]);
} catch (PDOException $e) {
    $_SESSION['errors'] = "Error al registrar comentario: " . $e->getMessage();
}

require __DIR__ . '/../clase/view.php';
