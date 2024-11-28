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

logMessage("POST Data: " . json_encode($_POST));

// Determine if we're adding or updating the course
$ID_curso = $_POST['ID_cur'];
$opcion = $ID_curso ? 'actualizar' : 'agregar'; // Set option based on whether course ID exists

logMessage("Option: " . $opcion);

// Retrieve other course details
$ID_categoria = $_POST['inputCategoria'];
$ID_maestro = $_SESSION['user']['id_rol'];
$imagen = $_FILES['file'];
$titulo = $_POST['inputNombreCurso'];
$descripcion = $_POST['inputDescripcion'];
$precio = $_POST['inputPrecio'];

// Handle image file (if exists)
$imageData = null;
if (isset($imagen) && $imagen['error'] === 0) {
    logMessage("Image found. Preparing to save image data.");
    $imageData = file_get_contents($imagen['tmp_name']);  // Convert the image to binary data
}

// Begin transaction (if required)
try {
    // If updating, fetch existing levels (niveles), classes (clases), and learning objectives (aprendizajes)
    if ($opcion == 'actualizar') {
        // Fetch existing levels for the course
        $niveles = $db->query("SELECT * FROM NIVELES WHERE ID_curso = ?", [$ID_curso])->get();
        // Fetch existing classes for the course
        $clases = $db->query("SELECT * FROM CLASES WHERE ID_curso = ?", [$ID_curso])->get();
        // Fetch existing learning objectives for the course
        $aprendizajes = $db->query("SELECT * FROM APRENDIZAJES WHERE ID_curso = ?", [$ID_curso])->get();
    }

    // Update course details (add or update)
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

    // Process aprendizajes (learning objectives)
    $aprendizajesPost = $_POST['aprendizajes'];
    foreach ($aprendizajesPost as $key => $aprendizaje) {
        // If updating, use the existing aprendizajes' ID, else create a new one
        $ID_aprendizaje = ($opcion == 'actualizar' && isset($aprendizajes[$key])) ? $aprendizajes[$key]['ID_aprendizaje'] : null;
        
        logMessage("Adding/updating aprendizaje: $aprendizaje (ID: $ID_aprendizaje)");
        $db->query("CALL sp_update_aprendizajes(?,?,?,?)", [
            $opcion, 
            $ID_curso['ID_curso'], 
            $aprendizaje, 
            $ID_aprendizaje
        ])->find();
    }

    // Process niveles (levels)
    $nombreNivel = $_POST['NombreNivel'];
    $precioNivel = $_POST['PrecioNivel'];
    foreach ($nombreNivel as $nivelKey => $nivel) {
        // If updating, use the existing niveles' ID, else create a new one
        $ID_nivel = ($opcion == 'actualizar' && isset($niveles[$nivelKey])) ? $niveles[$nivelKey]['ID_nivel'] : null;
    
        logMessage("Adding/updating nivel: $nivel with price {$precioNivel[$nivelKey]} (ID: $ID_nivel)");
        $ID_nivel = $db->query("CALL sp_update_niveles(?,?,?,?,?)", [
            $opcion, 
            $ID_curso['ID_curso'], 
            $nivel, 
            $precioNivel[$nivelKey], 
            $ID_nivel
        ])->find();
        logMessage("Nivel ID: " . json_encode($ID_nivel));
    
        logMessage("POST Data: " . json_encode($_POST));

        // Access the POST data with adjusted key
        $nombreClase = $_POST["clasesNivel_" . ($nivelKey + 1)];
        $descripcionClase = $_POST["descripcionesNivel_" . ($nivelKey + 1)];
        $ID_claseArray = $_POST["ID_clase_" . ($nivelKey + 1)];
        $videoClase = $_POST["CompressedVideos_" . ($nivelKey + 1)];

        // Check for empty POST data
        if (empty($nombreClase)) {
            logMessage("Error: No classes found in POST for nivel " . ($nivelKey + 1));
        }
        if (empty($descripcionClase)) {
            logMessage("Error: No descriptions found in POST for nivel " . ($nivelKey + 1));
        }
        if (empty($videoClase)) {
            logMessage("Error: No videos found in POST for nivel " . ($nivelKey + 1));
        }

        // Log data before processing
        logMessage("Clases: " . json_encode($nombreClase));
        logMessage("Descripciones: " . json_encode($descripcionClase));
        logMessage("Videos: " . json_encode($videoClase));

        foreach ($nombreClase as $claseKey => $clase) {
            $ID_clase = ($opcion == 'actualizar' && isset($ID_claseArray[$claseKey])) ? $ID_claseArray[$claseKey] : null;
    
            $videoFileName = $videoClase[$claseKey];
            logMessage("Processing clase: $clase, Video Name: $videoFileName");
    
            if (!$videoFileName) {
                $videoFileName = $_POST["CompressedVideos_" . ($nivelKey - 1)][$claseKey];  // Existing video name
                $videoContent = null;  // No new video content
                logMessage("No video provided for clase: $clase");
            } else {
                $videoFilePath = __DIR__ . '/../../APIs/uploads/' . $videoFileName;
                logMessage("Processing clase: $clase, Video Path: $videoFilePath");
    
                if (file_exists($videoFilePath)) {
                    $videoContent = file_get_contents($videoFilePath); // Read the video file content as binary
                    logMessage("Video file found: $videoFileName");
                } else {
                    logMessage("Error: Video not found at path: $videoFilePath");
                    $_SESSION['errors'] = "El video no se encontró. " . $videoFilePath;
                    
                    if ($opcion == 'agregar') {
                        header('Location: /nuevo_curso');
                    } else {
                        echo '<form id="postForm" action="/editar_curso" method="POST">';
                        echo '<input type="hidden" name="id" value="' . $ID_curso . '">';
                        echo '</form>';
                        echo '<script>document.getElementById("postForm").submit();</script>';
                    }
                    return;
                }
            }
    
            // Insert or update class (clase) with video (if provided)
            $ID_clase = $db->query("CALL sp_update_clases(?,?,?,?,?,?,?)", [
                $opcion, 
                $ID_curso['ID_curso'], 
                $ID_nivel['ID_nivel'], 
                $clase, 
                $descripcionClase[$claseKey], 
                $videoContent,  // Will be null if no video
                $ID_clase
            ])->find();
    
            logMessage("Clase added/updated. Clase: $clase");
            logMessage("Clase ID: " . json_encode($ID_clase));

            $materials = $_POST["Materials_" . ($nivelKey + 1) . "_" . ($claseKey + 1)];
            $links = $_POST["Links_" . ($nivelKey + 1) . "_" . ($claseKey + 1)];

            // Log materials and links
            logMessage("Materials: " . json_encode($materials));
            logMessage("Links: " . json_encode($links));

            // Process materials
            foreach ($materials as $material) {
                if (empty($material)) {
                    logMessage("Error: Empty material found for clase: $clase");
                    continue;
                }
                $materialFileName = $material;
                $materialFilePath = __DIR__ . '/../../APIs/uploads/' . $materialFileName;
                logMessage("Processing material: $materialFileName");
    
                if (file_exists($materialFilePath)) {
                    $materialContent = file_get_contents($materialFilePath); // Read the material file content as binary
                    logMessage("Material file found: $materialFileName");
                    $materialMimeType = mime_content_type($materialFilePath);
                    logMessage("Material MIME type: $materialMimeType");
                    logMessage("Material content length: " . strlen($materialContent));
                } else {
                    logMessage("Error: Material not found at path: $materialFilePath");
                    $_SESSION['errors'] = "El material no se encontró. " . $materialFilePath;
                    return;
                }
    
                // Insert material
                $db->query("CALL sp_update_recursos(?,?,?,?,?,?,?)", [
                    $opcion, 
                    $ID_curso['ID_curso'], 
                    $ID_nivel['ID_nivel'], 
                    $ID_clase['ID_clase'], 
                    null,
                    $materialContent,
                    $materialMimeType
                ])->find();
    
                logMessage("Material added. Material: $materialFileName");
                logMessage("Parameters: " . json_encode([$opcion, $ID_curso['ID_curso'], $ID_nivel['ID_nivel'], $ID_clase['ID_clase'], null, $materialContent, $materialMimeType]));
            }

            // Process links
            foreach ($links as $link) {
                if (empty($link)) {
                    logMessage("Error: Empty link found for clase: $clase");
                    continue;
                }
    
                // Insert link
                $db->query("CALL sp_update_links(?,?,?,?,?,?)", [
                    $opcion, 
                    $ID_curso['ID_curso'], 
                    $ID_nivel['ID_nivel'], 
                    $ID_clase['ID_clase'], 
                    null,
                    $link
                ])->find();
    
                logMessage("Link added. Link: $link");
                logMessage("Parameters: " . json_encode([$opcion, $ID_curso['ID_curso'], $ID_nivel['ID_nivel'], $ID_clase['ID_clase'], null, $link]));
                logMessage("query would look like: " . "CALL sp_update_links('". $opcion ."', '" . $ID_curso['ID_curso'] . "', '" . $ID_nivel['ID_nivel'] . "', '" . $ID_clase['ID_clase'] . "', null, '" . $link . "')");
            }
        }
    }
    
    
    logMessage("Course registration successful.");
    $_SESSION['success'] = "Curso registrado exitosamente";
    $_SESSION['delete_local'] = true;
    header('Location: /profile'); // Redirect to profile page

} catch (PDOException $e) {
    logMessage("Error during course registration: " . $e->getMessage());
    $_SESSION['errors'] = "Error al registrar curso: " . $e->getMessage();

    echo '<form id="postForm" action="/editar_curso" method="POST">';
    echo '<input type="hidden" name="id" value="' . $ID_curso . '">';
    echo '</form>';
    echo '<script>document.getElementById("postForm").submit();</script>';
    return;
}
