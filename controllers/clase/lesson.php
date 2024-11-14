<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$ID_curso = $_POST['ID_curso'];
$ID_estudiante = $_SESSION['user']['id_rol'];

$tipoPago = $db->query("SELECT tipo_pago FROM ESTUDIANTES_CURSOS WHERE ID_estudiante = ? AND ID_curso = ?", [
    $ID_estudiante,
    $ID_curso
])->find();

if ($tipoPago['tipo_pago'] == 1){//curso completo
    $niveles = $db->query("SELECT ID_nivel, titulo FROM NIVELES WHERE ID_curso = ?", [
        $ID_curso
    ])->get();
    $clases = $db->query("SELECT ID_nivel, ID_clase, titulo FROM CLASES WHERE ID_curso = ?", [
        $ID_curso
    ])->get();
} else {
    $nivelesComprados = $db->query("SELECT ID_nivel FROM NIVELES_COMPRADOS WHERE ID_estudiante = ? AND ID_curso = ?", [
        $ID_estudiante,
        $ID_curso
    ])->get();
    $niveles = [];
    $clases = [];
    foreach ($nivelesComprados as $nivel){
        $nivelInfo = $db->query("SELECT ID_nivel, titulo FROM NIVELES WHERE ID_curso = ? AND ID_nivel = ?", [
            $ID_curso,
            $nivel['ID_nivel']
        ])->find();
        $niveles[] = $nivelInfo;
        $clasesCompradas = $db->query("SELECT ID_nivel, ID_clase, titulo FROM CLASES WHERE ID_curso = ? AND ID_nivel = ?", [
            $ID_curso,
            $nivel['ID_nivel']
        ])->get();
        foreach ($clasesCompradas as $clase){
            $clases[] = $clase;
        }
    }
}

view('lesson.php',[
    'ID_curso' => $ID_curso,
    'ID_estudiante' => $ID_estudiante,
    'niveles' => $niveles,
    'clases' => $clases
]);