<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

header('Content-type: application/json');

$json = file_get_contents('php://input');
$body = json_decode($json, true);

$searchType = $body['searchType'] ?? null;
$searchQuery = $body['searchQuery'] ?? null;

if (!$searchType || !$searchQuery) {
    echo json_encode(['message' => 'Faltan campos']);
    exit();
}

try {
    switch ($searchType) {
        case 'cursos':
            $cursos = $db->query("SELECT * FROM v_dashboardCursosBusqueda WHERE titulo LIKE ? AND estatus = 1", ["%$searchQuery%"])->get();
            break;
        case 'instructores':
            $cursos = $db->query("SELECT * FROM v_dashboardCursosBusqueda WHERE (nombres LIKE ? OR apellido_paterno LIKE ? OR apellido_materno LIKE ?) AND estatus = 1", ["%$searchQuery%", "%$searchQuery%", "%$searchQuery%"])->get();
            break;
        case 'categorias':
            $cursos = $db->query("SELECT * FROM v_dashboardCursosBusqueda WHERE categoria LIKE ? AND estatus = 1", ["%$searchQuery%"])->get();
            break;
        default:
            echo json_encode(['message' => 'Tipo de búsqueda no válido']);
            exit();
    }

} catch (Exception $e) {
    echo json_encode(['message' => $e->getMessage()]);
    exit();
}

echo json_encode($cursos);