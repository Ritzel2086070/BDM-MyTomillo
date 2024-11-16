<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$ID_curso = $_POST['ID_curso'];

$curso = $db->query("SELECT * FROM v_cursosInfo WHERE ID_curso = ?", [
    $ID_curso])->find();

$aprendizajes = $db->query("SELECT * FROM APRENDIZAJES WHERE ID_curso = ?", [
    $ID_curso
])->get();

$niveles = $db->query("SELECT * FROM NIVELES WHERE ID_curso = ?", [
    $ID_curso
])->get();

$clases = $db->query("SELECT ID_curso, ID_nivel, ID_clase, titulo FROM CLASES WHERE ID_curso = ?", [
    $ID_curso
])->get();

$n_clases = $db->query("SELECT COUNT(ID_clase) as n_clases FROM CLASES WHERE ID_curso = ?", [
    $ID_curso
])->find();

$n_comentarios = $db->query("SELECT COUNT(ID_comentario) as n_comentarios FROM COMENTARIOS WHERE ID_curso = ?", [
    $ID_curso
])->find();

$comentarios = $db->query("SELECT * FROM v_comentarios WHERE ID_curso = ?", [
    $ID_curso
])->get();

$adquirido = null;
$infoUsuario = null;
$ultimo = null;

if(!$_SESSION['user']){
    $estado = "oferta";
}
else {
    if($_SESSION['user']['rol'] === "estudiante"){
        $adquirido = $db->query("SELECT * FROM ESTUDIANTES_CURSOS WHERE ID_estudiante = ? AND ID_curso = ?", [
            $_SESSION['user']['id_rol'],
            $ID_curso
        ])->find();
        if ($adquirido) {
            $infoUsuario = $db->query("SELECT nombres, apellido_paterno, apellido_materno FROM USUARIOS WHERE ID_usuario = ?", [
                $_SESSION['user']['id']
            ])->find();
            $ultimo = $db->query("SELECT f_visualizacion, ID_nivel, ID_clase FROM ESTUDIANTES_CLASES WHERE ID_estudiante = ? AND ID_curso = ? ORDER BY f_visualizacion DESC LIMIT 1", [
                $_SESSION['user']['id_rol'],
                $ID_curso
            ])->find();

            if($adquirido['estatus'] == 1){
                $estado = "terminado";
            } else {
                $estado = "cursando";
            }
        } else {
            $estado = "oferta";
        }
    } else {
        $estado = "";
    }
}

view("class.php", [
    'curso' => $curso,
    'aprendizajes' => $aprendizajes,
    'niveles' => $niveles,
    'clases' => $clases,
    'n_clases' => $n_clases["n_clases"],
    'n_comentarios' => $n_comentarios["n_comentarios"],
    'estado' => $estado,
    'adquirido' => $adquirido,
    'usuario' => $infoUsuario,
    'ultimo' => $ultimo,
    'comentarios' => $comentarios
]);