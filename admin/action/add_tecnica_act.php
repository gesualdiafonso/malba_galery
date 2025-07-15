<?php
require_once '../../includes/utilities/controllers/autoloader.php';

$postData = $_POST;
echo "<pre>";
print_r($postData);
echo "</pre>";

try {
    $tecnica = Tecnica::inserir(
        $postData['name'],
    );

    Flags::add_flags('success', "La Tecnica <strong>{$postData['name']}</strong> se ha creado correctamente.");

    header('Location: ../index.php?section=admin_tecnica');
} catch (Exception $e) {
    Flags::add_flags('danger', "No se pudo cargar la categoria. Error: " . " " . $e->getMessage());
}