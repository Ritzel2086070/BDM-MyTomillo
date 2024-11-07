<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

header('Content-type: application/json');

// Define the maximum allowed file size (16MB)
$maxFileSize = 16 * 1024 * 1024; // 16MB

// Ensure a video file was uploaded
if (!isset($_FILES['video'])) {
    echo json_encode(['success' => false, 'message' => 'No se ha enviado ningún video']);
    exit();
}

$videoFile = $_FILES['video'];

// Check for any upload errors
if ($videoFile['error'] !== UPLOAD_ERR_OK) {
    echo json_encode(['success' => false, 'message' => 'Error al subir el video']);
    exit();
}

// Validate file MIME type (basic check for a video file)
$allowedMimeTypes = ['video/mp4', 'video/avi', 'video/mkv', 'video/mov'];
if (!in_array($videoFile['type'], $allowedMimeTypes)) {
    echo json_encode(['success' => false, 'message' => 'El archivo no es un video válido']);
    exit();
}

// Sanitize file name
$videoFileName = basename($videoFile['name']);
$videoFileName = preg_replace('/[^a-zA-Z0-9._-]/', '_', $videoFileName);

$originalFilePath = __DIR__ . '/uploads/original_' . $videoFileName;
$compressedFilePath = __DIR__ . '/uploads/compressed_' . $videoFileName;

// Move the uploaded file to the original path
if (!move_uploaded_file($videoFile['tmp_name'], $originalFilePath)) {
    echo json_encode(['success' => false, 'message' => 'Error al guardar el video original']);
    exit();
}

// Compress the video using FFmpeg
$ffmpegCmd = "ffmpeg -i " . escapeshellarg($originalFilePath) . " -vcodec libx265 -crf 28 " . escapeshellarg($compressedFilePath);
exec($ffmpegCmd, $output, $returnCode);

// Capture FFmpeg output for debugging
$outputStr = implode("\n", $output); // Join the output array to form a readable string

// Check if compression was successful
if ($returnCode !== 0) {
    echo json_encode([
        'success' => false,
        'message' => 'Error al comprimir el video',
        'debug' => $outputStr // Add output to response for debugging
    ]);
    unlink($originalFilePath); // Clean up
    exit();
}

// Check compressed file size
$compressedSize = filesize($compressedFilePath);

if ($compressedSize > $maxFileSize) {
    echo json_encode(['success' => false, 'message' => 'El video es demasiado grande incluso después de la compresión']);
    unlink($compressedFilePath); // Clean up compressed file
    unlink($originalFilePath); // Clean up original file
    exit();
}

// Success: Return compressed video details
echo json_encode([
    'success' => true,
    'message' => 'El video se ha subido y comprimido correctamente',
    'compressedSize' => $compressedSize
]);

// Clean up the original file after compression
unlink($originalFilePath);
