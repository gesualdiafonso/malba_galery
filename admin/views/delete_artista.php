<?php
$id = $_GET['id'] ?? FALSE;

$artista = Artista::getById($id);

$detalles = DetallesArtista::getById($id);

?>

<section>
    <h2 class="uk-heading-large uk-text-center">¿Tiene certeza que desea <strong>borrar</strong> este artista?</h2>
    <div class="uk-grid-large uk-flex-middle" uk-grid>
        <div class="uk-width-1-1 uk-width-1-2@s">
            <img class="uk-border-rounded" src="../<?= $artista->getImagen(); ?>" alt="<?= $artista->getName(); ?>">
        </div>
        <div class="uk-width-1-1 uk-width-1-2@s">
            <h2 class="uk-heading-bullet"><?= $artista->getName(); ?></h2>
            <p class="uk-text-muted"><?= $artista->getBiografy(); ?></p>
            <span class="uk-text-warning"><?= $artista->getEstilo(); ?></span>
            <p class="uk-text-meta"><?= $artista->getCritica(); ?></p>
            <h3 class="uk-heading-bullet uk-heading-divider"> Details artist</h3>
            <?php if (!$detalles) { ?>
                <p class="uk-text-danger">No hay detalles disponibles para este artista.</p>
            <?php } else { ?>
                <div>
                    <ul class="uk-list uk-list-divider">
                        <li> <?= $detalles->getPremiacion(); ?> </li>
                        <li> <?= $detalles->getNacionalidad(); ?> </li>
                        <li> <?= $detalles->getAno_inicio(); ?> </li>
                        <li> <?= $detalles->getAno_fallecimiento(); ?> </li>
                        <li> <?= $detalles->getCuriosidad(); ?> </li>
                    </ul>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="uk-width-1-1">
        <a class="uk-button uk-button-small uk-button-default uk-text-center" href="action/delete_artista_act.php?id=<?= $artista->getId(); ?>">Borrar Artista</a>
    </div>
</section>