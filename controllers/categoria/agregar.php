<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$category = trim($_POST['category']);
$description = trim($_POST['description']);

try {
    $db->query('CALL sp_update_categoria("agregar", ?,?,?,NULL)', [
        $_SESSION['user']['id_rol'],
        $category,
        $description
    ]);
} catch (PDOException $e) {
    $_SESSION['errors'] = "Error al registrar categoría: " . $e->getMessage();
    header('Location: /profile');
    return;
}

$_SESSION['success'] = "Registro exitoso";
header('Location: /profile');