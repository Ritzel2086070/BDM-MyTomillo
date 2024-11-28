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

try {
    if ($filter == "todos") {
        $cursos = $db->query("SELECT * FROM v_dashboardCursos WHERE estatus = 1")->get();
    } 
    else if ($filter == "mas-vendidos") {
        $cursos = $db->query("SELECT * FROM v_dashboardCursos WHERE estatus = 1 ORDER BY n_estudiantes DESC")->get();
    } 
    else if ($filter == "mejor-valorados") {
        $cursos = $db->query("SELECT * FROM v_dashboardCursos WHERE estatus = 1 ORDER BY calificacion DESC")->get();
    } 
    else if ($filter == "mas-recientes") {
        $cursos = $db->query("SELECT * FROM v_dashboardCursos WHERE estatus = 1 ORDER BY f_creacion DESC")->get();
    }
    else {
        $complexfilter = explode('_', $filter);

        if($complexfilter[0] == "cat"){
            $cursos = $db->query("SELECT * FROM v_dashboardCursos WHERE ID_categoria = ? AND estatus = 1", [
                $complexfilter[1]
                ])->get();
                echo json_encode($cursos);
                exit();
        } else if (count($complexfilter) == 2 && strtotime($complexfilter[0]) && strtotime($complexfilter[1])) {
            $startDate = $complexfilter[0];
            $endDate = $complexfilter[1];
            
            if (DateTime::createFromFormat('Y-m-d', $startDate) && DateTime::createFromFormat('Y-m-d', $endDate)) {
                $cursos = $db->query(
                    "SELECT * FROM v_dashboardCursos WHERE f_creacion BETWEEN ? AND ? AND estatus = 1",
                    [$startDate, $endDate]
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
} catch (Exception $e) {
    echo json_encode(['message' => $e->getMessage()]);
    exit();
}

echo json_encode($cursos);