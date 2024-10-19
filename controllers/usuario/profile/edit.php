<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$names = trim($_POST['inputNombres']);
$lastName = trim($_POST['inputApellidoPaterno']);
$secondLastName = trim($_POST['inputApellidoMaterno']);
$gender = $_POST['selectGenero'];
$birthDate = $_POST['inputFecha'];
$email = trim($_POST['inputCorreo']);

try {
    $db->query("CALL sp_update_usuarios('actualizar',?,?,?,?,?,NULL,?,NULL,NULL,?)", [
        $gender,
        $names,
        $lastName,
        $secondLastName,
        $email,
        $birthDate,
        $_SESSION['user']['id']
    ]);
} catch (PDOException $e) {
    if ($e->errorInfo[1] == 1062) {
        $_SESSION['errors'] = "Este correo ya está registrado";
    } else {
        $_SESSION['errors'] = "Error al registrar usuario: " . $e->getMessage();
    }

    header('Location: /profile');
    return;
}

$_SESSION['success'] = "Datos actualizados";
header('Location: /profile');