<?php
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$inputData = json_decode(file_get_contents('php://input'), true);
$ID_curso = $inputData['ID_curso'] ?? null;
$ID_estudiante = $_SESSION['user']['id_rol'];

$clasesVistas = $db->query("SELECT ID_nivel, ID_clase FROM ESTUDIANTES_CLASES WHERE ID_estudiante = ? AND ID_curso = ? ORDER BY f_visualizacion ASC", [
    $ID_estudiante,
    $ID_curso
])->get();

if ($clasesVistas) {
    echo json_encode($clasesVistas);
}
else {
    echo json_encode([]);
}