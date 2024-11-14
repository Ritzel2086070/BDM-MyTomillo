<?php
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$inputData = json_decode(file_get_contents('php://input'), true);
$cursoID = $inputData['ID_curso'] ?? null;

$cursoData = $db->query("SELECT * FROM v_cursosCarrito WHERE ID_curso = ?", [$cursoID])->find();

$n_comentarios = $db->query("SELECT COUNT(ID_comentario) as n_comentarios FROM COMENTARIOS WHERE ID_curso = ?", [
    $cursoID
])->find();

$niveles = $db->query("SELECT ID_nivel, titulo, precio FROM NIVELES WHERE ID_curso = ?", [$cursoID])->get();


if ($cursoData) {
    $cursoData['n_comentarios'] = $n_comentarios['n_comentarios'];
    $cursoData['niveles'] = $niveles;
    echo json_encode($cursoData);
} else {
    echo json_encode(['error' => 'Curso no encontrado']);
}