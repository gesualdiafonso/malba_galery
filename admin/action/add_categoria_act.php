<?php
require_once '../../includes/utilities/controllers/autoloader.php';

$postData = $_POST;

try {
    $categoriaId = Categoria::addCategoria(
        $postData['name'],
        $postData['description']
    );

    Flags::add_flags('success', "La categoria <strong>{$postData['name']}</strong> se ha creado correctamente.");

    header('Location: ../index.php?section=admin_categoria');
} catch (Exception $e) {
    // echo "<pre>";
    // print_r($e);
    // echo "</pre>";
    // die('No consguimos cargar la categoria informada');
    Flags::add_flags('danger', "No se pudo cargar la categoria. Error: " . " " . $e->getMessage());
}