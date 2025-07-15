<?php
require_once '../../includes/utilities/controllers/autoloader.php';

$id = $_POST['id'] ?? FALSE;
$name = $_POST['name'] ?? FALSE;

try {
    $tecnica = Tecnica::getTecnicaId($id);

    $tecnica->update(
        $id,
        $name
    );

    Flags::add_flags('success', "La técnica {$tecnica->getName()} se ha editado correctamente.");

    header('Location: ../index.php?section=admin_tecnica');
} catch (Exception $e) {
    // die("No se pudo editar la técnica: " . $e->getMessage());
    Flags::add_flags('danger', "No se pudo editar la técnica. Error: " . " " . $e->getMessage());
}