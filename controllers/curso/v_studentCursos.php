<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

header('Content-type: application/json');

$json = file_get_contents('php://input');
$body = json_decode($json, true);

$filter = $body['filterBy'] ?? null;

if (!$filter) {
    echo json_encode(['message' => 'Faltan campos']);
    exit();
}

if ($filter == "todos") {
    $cursos = $db->query("SELECT * FROM v_cursosEstudiante WHERE ID_estudiante = ?", [
        $_SESSION['user']['id_rol']
    ])->get();
} else if ($filter == "activos") {
    $cursos = $db->query("SELECT * FROM v_cursosEstudiante WHERE estatus = 1 AND ID_estudiante = ?", [
        $_SESSION['user']['id_rol']
    ])->get();
} else if ($filter == "inactivos") {
    $cursos = $db->query("SELECT * FROM v_cursosEstudiante WHERE estatus = 0 AND ID_estudiante = ?", [
        $_SESSION['user']['id_rol']
    ])->get();
} else if ($filter == "completados") {
    $cursos = $db->query("SELECT * FROM v_cursosEstudiante WHERE terminado = 1 AND ID_estudiante = ?", [
        $_SESSION['user']['id_rol']
    ])->get();
} else if ($filter == "incompletos") {
    $cursos = $db->query("SELECT * FROM v_cursosEstudiante WHERE terminado = 0 AND ID_estudiante = ?", [
        $_SESSION['user']['id_rol']
    ])->get();
}
else {
    $complexfilter = explode('_', $filter);

    if($complexfilter[0] == "cat"){
        $cursos = $db->query("SELECT * FROM v_cursosEstudiante WHERE ID_categoria = ? AND ID_estudiante = ?", [
            $complexfilter[1],
            $_SESSION['user']['id_rol']
            ])->get();
            echo json_encode($cursos);
            exit();
    } else if (count($complexfilter) == 2 && strtotime($complexfilter[0]) && strtotime($complexfilter[1])) {
        $startDate = $complexfilter[0];
        $endDate = $complexfilter[1];
        
        if (DateTime::createFromFormat('Y-m-d', $startDate) && DateTime::createFromFormat('Y-m-d', $endDate)) {
            $cursos = $db->query(
                "SELECT * FROM v_cursosEstudiante WHERE f_inscripcion BETWEEN ? AND ? AND ID_estudiante = ?",
                [$startDate, $endDate, $_SESSION['user']['id_rol']]
            )->get();
            echo json_encode($cursos);
            exit();
        } else {
            echo json_encode(['message' => 'Invalid date format']);
            exit();
        }
    }
    echo json_encode(['message' => 'Filtro no válido']);
    exit();
}

echo json_encode($cursos);