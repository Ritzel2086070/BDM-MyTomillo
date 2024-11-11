<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$id = $_POST['id'];

try {
    $db->query('CALL sp_update_cursos("eliminar", NULL,NULL,NULL,NULL,NULL,NULL,?)', [
        $id
    ]);

} catch (PDOException $e) {
    $_SESSION['errors'] = "Error al eliminar curso: " . $e->getMessage();
    header('Location: /profile');
    return;
}

$_SESSION['success'] = "Curso eliminado";
header('Location: /profile');