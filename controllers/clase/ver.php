<?php
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$inputData = json_decode(file_get_contents('php://input'), true);
$ID_curso = $inputData['ID_curso'] ?? null;
$ID_nivel = $inputData['ID_nivel'] ?? null;
$ID_clase = $inputData['ID_clase'] ?? null;

$claseInfo = $db->query("SELECT titulo, descripcion FROM CLASES WHERE ID_curso = ? AND ID_nivel = ? AND ID_clase = ?", [
    $ID_curso,
    $ID_nivel,
    $ID_clase
])->find();

$recursos = $db->query("SELECT ID_recurso FROM RECURSOS WHERE ID_curso = ? AND ID_nivel = ? AND ID_clase = ?", [
    $ID_curso,
    $ID_nivel,
    $ID_clase
])->get();

$links = $db->query("SELECT link FROM LINKS WHERE ID_curso = ? AND ID_nivel = ? AND ID_clase = ?", [
    $ID_curso,
    $ID_nivel,
    $ID_clase
])->get();

if ($claseInfo) {
    
    echo json_encode([
        'titulo' => $claseInfo['titulo'],
        'descripcion' => $claseInfo['descripcion'],
        'recursos' => $recursos,
        'links' => $links
    ]);

    try {
        $db->query("INSERT INTO ESTUDIANTES_CLASES (ID_estudiante, ID_curso, ID_nivel, ID_clase) VALUES (?, ?, ?, ?)", [
            $_SESSION['user']['id_rol'],
            $ID_curso,
            $ID_nivel,
            $ID_clase
        ]);
    } catch (Exception $e) {
        // do nothing
    }
}