<?php
$id = $_GET['id'] ?? FALSE;

$obraId = Obras::galeria_id($id);

// $categoria = Categoria::getCategoriaId($id);
// $coleccion = Coleccion::getColeccionId($id);
// $artista = Artista::getById($id);
// $tecnica = Tecnica::getTecnicaId($id);

// echo "<pre>";
// print_r($obraId);
// echo "</pre>";

?>
<section>
    <h2 class="uk-heading-large uk-text-center">¿Tiene certeza que desea <strong>borrar</strong> esta Obra?</h2>
    <div class="uk-grid-large uk-flex-middle" uk-grid>
        <div class="uk-width-1-1 uk-width-1-2@s">
            <img class="uk-border-rounded" src="../<?= $obraId->getImage(); ?>" alt="<?= $obraId->getName(); ?>">
        </div>
        <div class="uk-width-1-1 uk-width-1-2@s">
            <h2 class="uk-heading-bullet"><?= $obraId->getName(); ?></h2>
            <h2 class="uk-text-warning"><?= $obraId->getArtista_id()->getName(); ?></h2>
            <p class="uk-text-muted"><?= $obraId->getDescription(); ?></p>
            <p class="uk-text-meta"><?= $obraId->getInforme(); ?></p>
            <h3 class="uk-heading-bullet uk-heading-divider"> Informaciones de la obra</h3>
            <div>
                <ul class="uk-list uk-list-divider">
                    <li> <?= $obraId->getCategoria_id()->getName(); ?> </li>
                    <li> <?= $obraId->getColeccion_id()->getName(); ?> </li>
                    <ul class="uk-list uk-list-divider">
                        <?php foreach($obraId->getTecnicas() as $value){ ?>
                            <li> <?= $value->getName(); ?> </li>
                        <?php } ?>
                    </ul>
                </ul>
            </div>
        </div>
    </div>
    <div class="uk-width-1-1">
        <a class="uk-button uk-button-small uk-button-default uk-text-center" href="action/delete_obra_act.php?id=<?= $obraId->getId(); ?>">Borrar Obra</a>
    </div>
</section>