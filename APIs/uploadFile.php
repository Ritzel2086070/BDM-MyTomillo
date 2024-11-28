<?php
use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

header('Content-type: application/json');

// Define the maximum allowed file size (16MB)
$maxFileSize = 16 * 1024 * 1024; // 16MB

// Ensure a file was uploaded
if (!isset($_FILES['file'])) {
    echo json_encode(['success' => false, 'message' => 'No se ha enviado ningún archivo']);
    exit();
}

$file = $_FILES['file'];

// Check for any upload errors
if ($file['error'] !== UPLOAD_ERR_OK) {
    echo json_encode(['success' => false, 'message' => 'Error al subir el archivo']);
    exit();
}

// Sanitize file name
$fileName = basename($file['name']);
$fileName = preg_replace('/[^a-zA-Z0-9._-]/', '_', $fileName);

$filePath = __DIR__ . '/uploads/' . $fileName;

// Move the uploaded file to the original path
if (!move_uploaded_file($file['tmp_name'], $filePath)) {
    echo json_encode(['success' => false, 'message' => 'Error al guardar el archivo']);
    exit();
}

echo json_encode(['success' => true, 'message' => 'Archivo subido con éxito', 'fileName' => $fileName]);
