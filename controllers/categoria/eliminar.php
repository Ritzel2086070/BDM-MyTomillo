<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$id = $_POST['id'];

try {
    $db->query('CALL sp_update_categoria("eliminar", NULL,NULL,NULL,?)', [
        $id
    ]);
} catch (PDOException $e) {
    $_SESSION['errors'] = "Error al eliminar categoría: " . $e->getMessage();
    header('Location: /profile');
    return;
}

$_SESSION['success'] = "Categoría eliminada";
header('Location: /profile');