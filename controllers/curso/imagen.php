<?php
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$imageId = $_GET['id'] ?? null;

$imageData = $db->query("SELECT imagen FROM CURSOS WHERE ID_curso = ?", [$imageId])->find();

if ($imageData) {
    $imageBlob = $imageData['imagen'];

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mimeType = $finfo->buffer($imageBlob);

    header('Content-Type: ' . $mimeType);

    echo $imageBlob;
}