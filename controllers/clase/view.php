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

if($_SESSION['user']['rol'] === "estudiante"){
    $adquirido = $db->query("SELECT * FROM ESTUDIANTES_CURSOS WHERE ID_estudiante = ? AND ID_curso = ?", [
        $_SESSION['user']['id_rol'],
        $ID_curso
    ])->find();
    if ($adquirido) {
        $infoUsuario = $db->query("SELECT nombres, apellido_paterno, apellido_materno FROM USUARIOS WHERE ID_usuario = ?", [
            $_SESSION['user']['id']
        ])->find();

        //get ultimo nivel y clase a partir de la fecha de visualizacion:
        /*
        CREATE TABLE ESTUDIANTES_CLASES (
    ID_estudiante       INT UNSIGNED NOT NULL,
    ID_curso            INT UNSIGNED NOT NULL,
    ID_nivel            TINYINT UNSIGNED NOT NULL,
    ID_clase            TINYINT UNSIGNED NOT NULL,
    f_visualizacion     DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT PK_ESTUDIANTES_CLASES PRIMARY KEY (ID_estudiante, ID_curso, ID_nivel, ID_clase),
    FOREIGN KEY (ID_estudiante, ID_curso) REFERENCES ESTUDIANTES_CURSOS(ID_estudiante, ID_curso),
    FOREIGN KEY (ID_curso, ID_nivel, ID_clase) REFERENCES CLASES(ID_curso, ID_nivel, ID_clase)
);
si el estudiante no tienen registros en la tabla ESTUDIANTES_CLASES, entonces el estudiante esta en el nivel 1, clase 1 con fecha de visualizacion igual a la fecha de inscripcion
 */

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

view("class.php", [
    'curso' => $curso,
    'aprendizajes' => $aprendizajes,
    'niveles' => $niveles,
    'clases' => $clases,
    'n_clases' => $n_clases["n_clases"],
    'n_comentarios' => $n_comentarios["n_comentarios"],
    'estado' => $estado,
    'adquirido' => $adquirido,
    'usuario' => $infoUsuario
]);