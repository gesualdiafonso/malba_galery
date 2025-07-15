<?php
require_once '../../includes/utilities/controllers/autoloader.php';

$postData = $_POST;
$fileData = $_FILES['image'];


// echo "<pre>";
// print_r($postData);
// echo "</pre>";

// echo "<pre>";
// print_r($fileData);
// echo "</pre>";

try {
    $image = Imagen::subirImagen("../../public/images/artes/", $fileData);

    $artistaId = isset($postData['artista_id']) ? (int) $postData['artista_id'] : 0;
    $coleccionId = Coleccion::insert(trim($postData['coleccion_name']));
    $categoriaId = isset($postData['categoria_id']) ? (int) $postData['categoria_id'] : 0;
    $galeriaId = Obras::insert(
        $postData['name'],
        $artistaId,
        $categoriaId,
        $coleccionId,
        $postData['description'],
        $postData['informe'],
        (int) $postData['publication'],
        $image, 
        (int) $postData['price']
    );


    // Hago una verificación si la tecnica ha sido seleccionada para passarlo en la galeria
    if(isset($postData['tecnicas']) && is_array($postData['tecnicas'])){
        foreach($postData['tecnicas'] as $tecnicaId){
            GaleriaTecnica::insert((int)$galeriaId, (int)$tecnicaId);
        }
    }

    Flags::add_flags('success', "La obra <strong>{$postData['name']}</strong> se ha creado correctamente.");


    // die("YOU DID MAN!");
} catch(Exception $e){
    // die("No se pudo cargar la obra" . $e->getMessage());
    Flags::add_flags('danger', "No se pudo cargar la obra. Error: " . " " . $e->getMessage());
}
header('Location: ../index.php?section=admin_obras');