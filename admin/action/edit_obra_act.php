<?php
require_once '../../includes/utilities/controllers/autoloader.php';

$id = isset($_POST['id']) ? intval($_POST['id']) : false;


$postData = $_POST;
$datosArhivo = $_FILES['image'];

// echo "<pre>";
// print_r($postData);
// echo "</pre>";

try {
    $obraId = Obras::galeria_id($id);

    // echo "<pre>";
    // print_r($obraId);
    // echo "</pre>";
    
    // Valido si el campo artista Id haya sido alterado en el form, si no lo mantengo
    $artistaId = isset($postData['artista_id']) && $postData['artista_id'] != $obraId->getArtista_id()->getId()
    ? $postData['artista_id']
    : $obraId->getArtista_id()->getId();
    
    // Valido si el campo categoria haya sido alterado
    $categoriaId = isset($postData['categoria_id']) && $postData['categoria_id'] != $obraId->getCategoria_id()->getId()
    ? $postData['categoria_id']
    : $obraId->getCategoria_id()->getId();
    

    // Valido si el campo coleccion haya sido alterado
    if (isset($postData['coleccion_name']) && $postData['coleccion_name']) {
        $coleccionNombre = trim($postData['coleccion_name']);
        $coleccionesExistentes = Coleccion::coleccion(); // obtengo todas las colecciones existentes

        $coleccionEncontrada = null;
        foreach ($coleccionesExistentes as $coleccion) {
            if (strtolower($coleccion->getName()) === strtolower($coleccionNombre)) {
                $coleccionEncontrada = $coleccion;
                break;
            }
        }

        if ($coleccionEncontrada) {
            // Se en caso de econtrar el nombre en la lista, usa el ID existente
            $coleccionId = $coleccionEncontrada->getId();
        } else {
            // Se no lo encontró, hago crear una nueva coleccion y uso su ID criado
            $nuevaColeccion = new Coleccion();
            $nuevaColeccion->insert($coleccionNombre); // inserta la nueva colección
            $coleccionId = $nuevaColeccion->getId();
        }
    } else {
        // Si el  usuário no ha cambiado el campo de colección dejamos pasar
        $coleccionId = $obraId->getColeccion_id()->getId();
    }

    if (!empty($datosArhivo['tmp_name'])) {
        $image = Imagen::subirImagen("../../public/images/artes/", $datosArhivo);
        Imagen::borrarImagen("../../public/images/artes/" . $obraId->getImage());
    } elseif (!empty($postData['image'])) {
        $image = $postData['image'];
    } else {
        $image = $obraId->getImage(); // fallback
    }

    $obraId->edit(
        $postData['name'],
        $artistaId,
        $categoriaId,
        $coleccionId,
        $postData['description'],
        $postData['informe'],
        $postData['publication'],
        $image,
        $postData['price']
    );

    // Atualizar Técnicas da Obra
    $tecnicasPost = $postData['tecnicas'] ?? [];
    $tecnicasPost = array_map('intval', $tecnicasPost); // Convertir a enteros

    // Obtener las técnicas actuales de la obra
    $tecnicasAtuais = GaleriaTecnica::getTecnicasByObra($obraId->getId());
    $tecnicasAtuais = array_map('intval', $tecnicasAtuais);

    // Técnicas a adicionar
    $novasTecnicas = array_diff($tecnicasPost, $tecnicasAtuais);
    foreach ($novasTecnicas as $novaTec) {
        GaleriaTecnica::insert($obraId->getId(), $novaTec);
    }

    // Técnicas a remover como es un array, la saco de adentro del array
    $removidas = array_diff($tecnicasAtuais, $tecnicasPost); 
    foreach ($removidas as $tecRemovida) {
        GaleriaTecnica::delete($obraId->getId(), $tecRemovida);
    }

    Flags::add_flags('success', "La obra {$obraId->getName()} se ha editado correctamente.");

    header('Location: ../index.php?section=admin_obras');
} catch (Exception $e) {
    // echo "Error: " . $e->getMessage();
    Flags::add_flags('danger', "No se pudo editar la obra. Error: " . " " .  $e->getMessage());
}