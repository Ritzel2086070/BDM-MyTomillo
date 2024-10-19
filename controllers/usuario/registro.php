<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$file = $_FILES['file'];
$names = trim($_POST['inputNombres']);
$lastName = trim($_POST['inputApellidoPaterno']);
$secondLastName = trim($_POST['inputApellidoMaterno']);
$gender = $_POST['selectGenero'];
$birthDate = $_POST['inputFecha'];
$email = trim($_POST['inputCorreo']);
$password = trim($_POST['inputContra']);
$role = $_POST['options'];

if ($role === "estudiante") {
    $role = "estudiante";
} else if ($role === "maestro") {
    $role = "maestro";
} else {
    $role = "estudiante";
}

$imageData = null;
if (isset($file) && $file['error'] === 0) {
    $imageData = file_get_contents($file['tmp_name']);  // Convert the file to binary
}

try {
    $db->query("CALL sp_update_usuarios('agregar',?,?,?,?,?,?,?,?,?,NULL)", [
        $gender,
        $names,
        $lastName,
        $secondLastName,
        $email,
        $password,
        $birthDate,
        $imageData,
        $role
    ]);
} catch (PDOException $e) {

    if ($e->errorInfo[1] == 1062) {
        $_SESSION['errors'] = "Este correo ya está registrado";
    } else {
        $_SESSION['errors'] = "Error al registrar usuario: " . $e->getMessage();
    }

    header('Location: /signin');
    return;
}

$_SESSION['success'] = "Registro exitoso";
header('Location: /');