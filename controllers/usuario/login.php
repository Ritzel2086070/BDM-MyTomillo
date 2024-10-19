<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['inputCorreo'];
$password = $_POST['inputContra'];

$errors = "";


$user = $db->query('select ID_usuario, estatus, foto from USUARIOS where correo = ? and contrasena_hash = SHA2(?,256)', [
    $email,
    $password
])->find();

if ($user) {
    if($user['estatus'] == 0){
        $errors = "Usuario inactivo";
    } else {
        $rol = $db->query('SELECT ID_estudiante FROM ESTUDIANTES WHERE ID_usuario = ?', [
            $user['ID_usuario']
        ])->find();
        if ($rol) {
            $_SESSION['user'] = [
                'id' => $user['ID_usuario'],
                'foto' => $user['foto'],
                'rol' => 'estudiante',
                'id_rol' => $rol['ID_estudiante']
            ];
        } else {
            $rol = $db->query('SELECT ID_maestro FROM MAESTROS WHERE ID_usuario = ?', [
                $user['ID_usuario']
            ])->find();
            if ($rol) {
                $_SESSION['user'] = [
                    'id' => $user['ID_usuario'],
                    'foto' => $user['foto'],
                    'rol' => 'maestro',
                    'id_rol' => $rol['ID_maestro']
                ];
            } else {
                $rol = $db->query('SELECT ID_administrador FROM ADMINISTRADORES WHERE ID_usuario = ?', [
                    $user['ID_usuario']
                ])->find();
                if ($rol) {
                    $_SESSION['user'] = [
                        'id' => $user['ID_usuario'],
                        'foto' => $user['foto'],
                        'rol' => 'admin',
                        'id_rol' => $rol['ID_administrador']
                    ];
                } else {
                    $errors = "Usuario sin rol";
                }
            }
        }
        
    }
    
} else {
    $errors = "Credenciales incorrectas";   
}


if (! empty($errors)) {
    session_destroy();
    session_start();
    $_SESSION['errors'] = $errors;
    
    header('Location: /');
    return;
} else {

    header('Location: /dashboard');
    return;
}