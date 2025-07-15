<?php
$allArtista = Artista::artistas();

// echo "<pre>";
// print_r($allArtista);
// echo "</pre>";

?>
<div>
    <?= Flags::get_flags(); ?>
</div>
<table class="uk-table uk-table-justify uk-table-divider">
    <thead>
        <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Información</th>
            <th>Critica y Estilo</th>
            <th>Contador de Obras</th>
            <th>Controles</th>
        </tr>
    </thead>
    <tbody> 
        <?php foreach($allArtista as $artista) {?>
            <tr>
                <td><img class="uk-preserve-width" src="../<?= $artista->getImagen(); ?>" width="200" height="250" alt="<?= $artista->getName(); ?>"></td>
                <td class="uk-text-center" width="200"><h2><?= $artista->getName(); ?></h2></td>
                <td width="250">
                    <p><?= $artista->biografia_reducida(); ?></p>
                </td>
                <td width="300">
                    <div>
                        <div><p><?= $artista->estilo_reducida(); ?></p></div>
                        <div><p><?= $artista->critica_reducida(); ?></p></div>
                    </div>
                </td>
                <td width="200"><h2><?= Obras::contarObrasPorArtista($artista->getId()); ?></h2></td>
                <td width="300">
                    <a class="uk-button uk-button-small uk-button-danger uk-text-center" href="index.php?section=delete_artista&id=<?= $artista->getId(); ?>">Borrar Artista</a>
                    <a class="uk-button uk-button-small uk-button-secondary uk-text-center" href="index.php?section=edit_artista&id=<?= $artista->getId(); ?>">Editar Artista</a>
                    <a class="uk-button uk-button-small uk-button-default uk-text-center uk-text-warning" href="index.php?section=admin_obras">Ver Obras Completa</a>
                    <a class="uk-button uk-button-small uk-button-default uk-text-center uk-text-warning" href="index.php?section=add_obras">Adicionar Obras</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="uk-margin-large-bottom">
    <a class="uk-button uk-button-small uk-button-primary uk-text-center" href="index.php?section=add_artista">Crear Artistas</a>
</div>