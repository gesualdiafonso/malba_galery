<?php
require_once '../../includes/utilities/controllers/autoloader.php';

$id = $_GET['id'] ?? FALSE;

$postData = $_POST;

try {
    $categoria = Categoria::getCategoriaId($id);
    $categoria->deleteCategoria($id);

    Flags::add_flags('success', "La categoría se ha eliminado correctamente.");
    header('Location: ../index.php?section=admin_categoria');
} catch (Exception $e) {
    Flags::add_flags('danger', "No se pudo eliminar la categoría, por que hace referencia a nuestra Obra, si desea eliminar, elimine las obras que hacen parte o las edite a otra categoría!");
    header('Location: ../index.php?section=admin_categoria');

}