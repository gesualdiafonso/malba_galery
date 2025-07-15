<?php
require_once '../../includes/utilities/controllers/autoloader.php';

$id = $_GET['id'] ?? FALSE;

try{

    $obraId = Obras::galeria_id($id);
    $obraId->delete();
    Imagen::borrarImagen("../../images/artistas/" . $obraId->getImage());
    $coleccion = Coleccion::getColeccionId($obraId->getColeccion_id()->getId());
    $coleccion->delete();

    Flags::add_flags('success', "La obra se ha eliminado correctamente.");
    
} catch (Exception $e){
    // die("No se pudo eliminar el artista" . $e->getMessage());
    Flags::add_flags('danger', "No se pudo eliminar la obra. Pues el mismo hace parte de ligaciones en nuestra base de datos. Si desea eliminar, elimine las obras que hacen parte o las edite a otra colección!");
}
header('Location: ../index.php?section=admin_obras');