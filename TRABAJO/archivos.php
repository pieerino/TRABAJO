<?php
// Verificar si se ha enviado un archivo
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['archivo'])) {
    $archivo = $_FILES['archivo'];

    // Validar que el archivo es un PDF
    $tipoArchivo = mime_content_type($archivo['tmp_name']);
    if ($tipoArchivo != 'application/pdf') {
        echo "Solo se permiten archivos PDF.";
        exit;
    }

    // Crear la carpeta 'uploads' si no existe
    $directorioSubida = 'uploads/';
    if (!is_dir($directorioSubida)) {
        mkdir($directorioSubida, 0755, true);
    }

    // Ruta completa donde se guardará el archivo
    $rutaDestino = $directorioSubida . basename($archivo['name']);

    // Subir el archivo al servidor
    if (move_uploaded_file($archivo['tmp_name'], $rutaDestino)) {
        echo "Archivo subido correctamente.";
    } else {
        echo "Error al subir el archivo.";
    }
} else {
    echo "No se ha subido ningún archivo.";
}
?>
