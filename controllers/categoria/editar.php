<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$category = trim($_POST['category']);
$description = trim($_POST['description']);
$id = $_POST['id'];

try {
    $db->query('CALL sp_update_categoria("actualizar", ?,?,?,?)', [
        $_SESSION['user']['id_rol'],
        $category,
        $description,
        $id
    ]);
} catch (PDOException $e) {
    $_SESSION['errors'] = "Error al editar categoría: " . $e->getMessage();
    header('Location: /profile');
    return;
}

$_SESSION['success'] = "Datos actualizados";
header('Location: /profile');