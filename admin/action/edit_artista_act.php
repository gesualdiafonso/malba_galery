<?php
require_once '../../includes/utilities/controllers/autoloader.php';

$id = isset($_POST['id']) ? intval($_POST['id']) : false;
var_dump($id);

$postData = $_POST;
$datosArchivo = $_FILES['imagen'];

// echo "<pre>";
// print_r($id);
// echo "</pre>";

// echo "<pre>";
// print_r($postData);
// echo "</pre>";

// echo "<pre>";
// print_r($datosArchivo);
// echo "</pre>";

try{
    $artista = Artista::getById($id);

    if (!empty($datosArchivo['tmp_name'])) {
        $imagen = Imagen::subirImagen("../../public/images/artistas/", $datosArchivo);
        Imagen::borrarImagen("../../public/images/artistas/" . $artista->getImagen());
    } elseif (!empty($postData['imagen'])) {
        $imagen = $postData['imagen'];
    } else {
        $imagen = $artista->getImagen(); // fallback
    }

    $artista->edit(
        $postData['name'],
        $postData['biografy'],
        $postData['estilo'],
        $postData['critica'],
        $imagen
    );

    
    $detalles = DetallesArtista::getById($id);
    $anoFallecimiento = !empty($postData['ano_fallecimiento']) ? $postData['ano_fallecimiento'] : null;

    // echo "<pre>";
    // print_r($detalles);
    // echo "</pre>";

    // Hago una verificación si el detalle exite antes de editarlo
    $detalles->edit(
        $id, // artista_id
        $postData['premiacion'],
        $postData['curiosidad'],
        $postData['ano_inicio'],
        $anoFallecimiento,
        $postData['nacionalidad']
    );

    Flags::add_flags('success', "El artista {$postData['name']} se ha editado correctamente.");
    
    header('Location: ../index.php?section=admin_artista');
} catch (Exception $e){
    // die("No se pudo editar el artista $id. Error: " . $e->getMessage());
    Flags::add_flags('danger', "No se pudo editar el artista. Error: " . " " . $e->getMessage());
}
