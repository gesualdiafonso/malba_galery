<?php
require_once '../../includes/utilities/controllers/autoloader.php';

$id = $_GET['id'] ?? FALSE;

try{

    $artista = Artista::getById($id);
    $artista->delete();
    Imagen::borrarImagen("../../images/artistas/" . $artista->getImagen());
    $detalles = DetallesArtista::getById($id);
    if ($detalles) {
        $detalles->delete();
    }

    Flags::add_flags('success', "Artista se ha eliminado correctamente.");
    
} catch (Exception $e){
    // die("No se pudo eliminar el artista" . $e->getMessage());
    Flags::add_flags('danger', "No se pudo eliminar el artista. Pues el mismo tiene obras asociadas.");
}
header('Location: ../index.php?section=admin_artista');