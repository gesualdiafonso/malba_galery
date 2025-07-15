<?php
require_once '../../includes/utilities/controllers/autoloader.php';

$id = $_POST['id'] ?? FALSE;

$postData = $_POST;

try {
    $categoria = Categoria::getCategoriaId($id);

    $categoria->updateCategoria(
        $id,
        $postData['name'],
        $postData['description']
    );

    Flags::add_flags('success', "La categoría {$categoria->getName()} se ha editado correctamente.");

    header('Location: ../index.php?section=admin_categoria');
} catch (Exception $e) {
    // die("No se pudo editar la categoría: " . $e->getMessage());
    Flags::add_flags('danger', "No se pudo editar la categoría. Error: " . " " . $e->getMessage());
}