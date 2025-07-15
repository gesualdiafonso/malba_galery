<?php
$allObras = Obras::galeria_completa();
?>
<div>
    <?= Flags::get_flags(); ?>
</div>
<table class="uk-table uk-table-justify uk-table-divider">
    <thead>
        <tr>
            <th><p>Imagen</p></th>
            <th><p>Nombre</p></th>
            <th><p>Description</p></th>
            <th><p>Información</p></th>
            <th><p>Valor</p></th>
            <th><p>Controles</p></th>
        </tr>
    </thead>
    <tbody> 
        <?php foreach($allObras as $obra) {?>
            <tr>
                <td><img class="uk-preserve-width" src="../<?= $obra->getImage(); ?>" width="200" height="250" alt="<?php echo $obra->getName() . ", " . $obra->getInforme(); ?>"></td>
                <td class="uk-text-center" width="200"><h2> <?= $obra->getName(); ?> </h2></td>
                <td width="250">
                    <p> <?= $obra->description_reducida(); ?> </p>
                </td>
                <td width="300">
                    <div>
                        <div><p><?= $obra->getPublication(); ?></p></div>
                        <div><p><?= $obra->getArtista_id()->getName(); ?></p></div>
                        <div><p><?= $obra->getColeccion_id()->getName(); ?></p></div>
                        <div><p><?= $obra->getCategoria_id()->getName(); ?></p></div>
                    </div>
                </td>
                <td><h3> <?= $obra->getFormattedPrice(); ?> </h3></td>
                <td width="300" class="uk-flex uk-flex-column uk-flex-center">
                    <a class="uk-button uk-button-small uk-button-danger uk-text-center" href="index.php?section=delete_obras&id=<?= $obra->getId(); ?>">Borrar Obra</a>
                    <a class="uk-button uk-button-small uk-button-secondary uk-text-center" href="index.php?section=edit_obras&id=<?= $obra->getId(); ?>">Editar Obra</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<div class="uk-margin-large-bottom">
    <a class="uk-button uk-button-small uk-button-primary uk-text-center" href="index.php?section=add_obras">Crear Obras</a>
</div>