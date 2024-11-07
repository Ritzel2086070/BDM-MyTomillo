<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$id = $_POST['id'];

try {
    $db->query('CALL sp_update_usuarios("reactivar",NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,?)', [
        $id
    ]);
} catch (PDOException $e) {
    $_SESSION['errors'] = "Error al desbloquear usuario: " . $e->getMessage();
    header('Location: /profile');
    return;
}

$_SESSION['success'] = "Usuario desbloqueado";
header('Location: /profile');