<?php
require_once '../../includes/utilities/controllers/autoloader.php';

$postData = $_POST;
$fileData = $_FILES['imagen'];

// Array to store validation errors
$errors = [];

// --- Validation for DetallesArtista fields ---
if (empty($postData['premiacion'])) {
    $errors[] = 'El campo <strong>Premiación</strong> no puede estar vacío.';
}
if (empty($postData['curiosidad'])) {
    $errors[] = 'El campo <strong>Curiosidad</strong> no puede estar vacío.';
}
if (empty($postData['nacionalidad'])) {
    $errors[] = 'El campo <strong>Nacionalidad</strong> no puede estar vacío.';
}

// --- Validation for ano_inicio ---
$anoInicio = (int)($postData['ano_inicio'] ?? 0); // Default to 0 if not set to prevent errors
if (empty($postData['ano_inicio'])) {
    $errors[] = 'El campo <strong>Año de Inicio</strong> no puede estar vacío.';
} elseif ($anoInicio < 1910) {
    $errors[] = 'El <strong>Año de Inicio</strong> debe ser igual o superior a 1910.';
}
// --- Check if there are any validation errors ---
if (!empty($errors)) {
    foreach ($errors as $error) {
        Flags::add_flags('warning', $error);
    }
    header('Location: ../index.php?section=add_artista');
    exit;
}

// echo "<pre>";
// print_r($postData);
// echo "</pre>";

// echo "<pre>";
// print_r($fileData);
// echo "</pre>";

try{
    $imagen = Imagen::subirImagen("../../public/images/artistas/", $fileData);
    $artistaId = Artista::insert(
        $postData['name'],
        $postData['biografy'],
        $postData['estilo'],
        $postData['critica'],
        $imagen
    );

    echo"<pre>";
    print_r($artistaId);
    echo"</pre>";

    $anoFallecimiento = !empty($postData['ano_fallecimiento']) ? $postData['ano_fallecimiento'] : null;
    DetallesArtista::insert(
        $artistaId,
        $postData['premiacion'],
        $postData['curiosidad'],
        (int)$postData['ano_inicio'],
        $anoFallecimiento,
        $postData['nacionalidad']
    );

    // echo "<pre>";
    // print_r($postData);
    // echo "</pre>";

    Flags::add_flags('success', "El artista <strong>{$postData['name']}</strong> se ha creado correctamente.");

    header('Location: ../index.php?section=admin_artista');
} catch (Exception $e){

    Flags::add_flags('danger', "No se pudo cargar el artista.");
    header('Location: ../index.php?section=add_artista'); // Redirect back to the form
    exit;
}

