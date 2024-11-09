<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

// Log function to help with debugging
function logMessage($message) {
    $logFile = __DIR__ . '/debug_log.txt'; // Log file path
    file_put_contents($logFile, date('[Y-m-d H:i:s] ') . $message . PHP_EOL, FILE_APPEND);
}

// Start logging
logMessage("Script execution started.");

$ID_curso = $_POST['ID_cur'];
logMessage("ID_curso: " . ($ID_curso ? $ID_curso : 'NULL'));

if($ID_curso){
    $opcion = 'actualizar';
} else {
    $ID_curso = null;
    $opcion = 'agregar';
}
logMessage("Option: " . $opcion);

$ID_categoria = $_POST['inputCategoria'];
$ID_maestro = $_SESSION['user']['id_rol'];
$imagen = $_FILES['file'];
$titulo = $_POST['inputNombreCurso'];
$descripcion = $_POST['inputDescripcion'];
$precio = $_POST['inputPrecio'];

logMessage("Course details: Categoria = $ID_categoria, Maestro = $ID_maestro, Titulo = $titulo, Precio = $precio");

$imageData = null;
if (isset($imagen) && $imagen['error'] === 0) {
    logMessage("Image found. Preparing to save image data.");
    $imageData = file_get_contents($imagen['tmp_name']);  // Convert the file to binary
} else {
    logMessage("No image or image error detected.");
}

try {
    logMessage("Calling sp_update_cursos stored procedure.");
    $ID_curso = $db->query("CALL sp_update_cursos(?,?,?,?,?,?,?,?)", [
        $opcion,
        $ID_categoria,
        $ID_maestro,
        $imageData,
        $titulo,
        $descripcion,
        $precio,
        $ID_curso
    ])->find();
    
    logMessage("Course created/updated. Course ID: " . json_encode($ID_curso));

    if ($ID_curso) {
        $aprendizajes = $_POST['aprendizajes'];
        $ID_aprendizaje = null;

        foreach ($aprendizajes as $key => $aprendizaje) {
            logMessage("Adding aprendizaje: $aprendizaje");
            $db->query("CALL sp_update_aprendizajes(?,?,?,?)", [
                $opcion,
                $ID_curso['ID_curso'],
                $aprendizaje,
                $ID_aprendizaje
            ])->find();
        }

        $nombreNivel = $_POST['NombreNivel'];
        $precioNivel = $_POST['PrecioNivel'];

        foreach ($nombreNivel as $key => $nivel) {
            $ID_nivel = null;
            logMessage("Adding nivel: $nivel with price {$precioNivel[$key]}");
            $ID_nivel = $db->query("CALL sp_update_niveles(?,?,?,?,?)", [
                $opcion,
                $ID_curso['ID_curso'],
                $nivel,
                $precioNivel[$key],
                $ID_nivel
            ])->find();
            logMessage("Nivel ID: " . json_encode($ID_nivel));

            $nombreClase = $_POST['Clases'];
            $descripcionClase = $_POST['Descripciones'];
            $videoClase = $_POST['CompressedVideos'];

            foreach ($nombreClase as $key => $clase) {
                $ID_clase = null;
                $videoFileName = $videoClase[$key];
                $videoFilePath = __DIR__ . '/../../APIs/uploads/' . $videoFileName;
                logMessage("Processing clase: $clase, Video Path: $videoFilePath");

                if (file_exists($videoFilePath)) {
                    $videoContent = file_get_contents($videoFilePath); // Read the video file content as binary data
                    logMessage("Video file found: $videoFileName");
                } else {
                    logMessage("Error: Video not found at path: $videoFilePath");
                    $_SESSION['errors'] = "El video no se encontró. " . $videoFilePath;
                    if($opcion == 'agregar'){
                        header('Location: /nuevo_curso');
                    } else {
                        header('Location: /editar_curso');
                    }
                    return;
                }

                $db->query("CALL sp_update_clases(?,?,?,?,?,?,?)", [
                    $opcion,
                    $ID_curso['ID_curso'],
                    $ID_nivel['ID_nivel'],
                    $clase,
                    $descripcionClase[$key],
                    $videoContent,
                    $ID_clase
                ])->find();
                logMessage("Clase added/updated. Clase: $clase");
            }
        }
    }

    logMessage("Course registration successful.");
    $_SESSION['success'] = "Curso registrado exitosamente";
    $_SESSION['delete_local'] = true;
    header('Location: /profile');

} catch (PDOException $e) {
    logMessage("Error during course registration: " . $e->getMessage());
    $_SESSION['errors'] = "Error al registrar curso: " . $e->getMessage();
    if($opcion == 'agregar'){
        header('Location: /nuevo_curso');
    } else {
        header('Location: /editar_curso');
    }
    return;
}
