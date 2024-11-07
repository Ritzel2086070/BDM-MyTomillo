<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$email = $_POST['inputCorreo'];
$password = $_POST['inputContra'];

$errors = "";


$user = $db->query("CALL sp_update_usuarios('inicio',NULL,NULL,NULL,NULL,?,?,NULL,NULL,NULL,NULL)", [
    $email,
    $password
])->find();

if ($user) {
    if(isset($user['estatus'])){
        if($user['estatus'] == 0){
            $errors = "Usuario bloqueado";
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
    }

    if(isset($user['n_intentos'])){
        if($user['n_intentos'] >= 3){
            $errors = "Usuario bloqueado";
            $db->query('CALL sp_update_usuarios("desactivar",NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,?)', [
                $user['ID_usuario']
            ]);
        } else {
            $errors = "Contraseña incorrecta";
        }
    }
    
} else {
    $errors = "No existe un usuario con ese correo";   
}

if (!empty($errors)) {
    session_destroy();
    session_start();
    $_SESSION['errors'] = $errors;
    
    header('Location: /');
    return;
} else {

    header('Location: /dashboard');
    return;
}