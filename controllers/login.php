<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['inputCorreo'];
$password = $_POST['inputContra'];

$errors = "";


$user = $db->query('select * from USUARIOS where correo = :correo', [
    'correo' => $email
])->find();

if ($user) {
    header('location: /dashboard');
    $_SESSION['user'] = [
        'email' => $email
    ];
    exit();
} else {
    $errors = "Usuario no encontrado";   
}


if (! empty($errors)) {
    return view('/login.landing.php', [
        'errors' => $errors
    ]);
}