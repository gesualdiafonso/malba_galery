<?php

$obrasArtista = Obras::galeriaPorAutor($artistaSelecionado);

// echo "<pre>";
// print_r($artistaSelecionado);
// echo "</pre>";

$detallesDelArtista =  DetallesArtista::getById($artistaSelecionado);

// echo "<pre>";
// print_r($detallesDelArtista);
// echo "</pre>";
?>

<section class="uk-section artista-section uk-padding uk-container">
    <div class="uk-grid-large uk-flex-middle" uk-grid>
        <div class="uk-width-1-1 uk-width-1-3@m artista-img" uk-scrollspy="cls: uk-animation-slide-left; repeat: true">
            <img class="uk-border-rounded" src="<?= $artista->getImagen(); ?>" alt="<?= $artista->getName(); ?>">
        </div>
        <div class="uk-width-1-1 uk-width-2-3@m" uk-scrollspy="cls: uk-animation-slide-right; repeat: true">
            <h2 class="uk-heading-bullet"><?= $artista->getName(); ?></h2>
            <p class="uk-text-muted"><?= $artista->getBiografy(); ?></p>
            <span class="uk-text-warning"><?= $artista->getEstilo(); ?></span>
            <p class="uk-text-meta"><?= $artista->getCritica(); ?></p>
            <!-- Detalles del artista -->
            <div class="uk-width-expand">
                <h3 class="uk-heading-bullet">Detalles de <?= $artista->getName() ?></h3>
                <ul uk-accordion>
                    <li>
                        <a class="uk-accordion-title" href>Nacionalidad</a>
                        <div class="uk-accordion-content">
                            <p><?= $detallesDelArtista->getNacionalidad(); ?></p>
                        </div>
                    </li>
                    <li>
                        <a class="uk-accordion-title" href>Premiación</a>
                        <div class="uk-accordion-content">
                            <p><?= $detallesDelArtista->getPremiacion(); ?></p>
                        </div>
                    </li>
                    <li>
                        <a class="uk-accordion-title" href>Curiosidad</a>
                        <div class="uk-accordion-content">
                            <p><?= $detallesDelArtista->getCuriosidad(); ?></p>
                        </div>
                    </li>
                    <li>
                        <a class="uk-accordion-title" href>Año de Inicio</a>
                        <div class="uk-accordion-content">
                            <p><?= $detallesDelArtista->getAno_inicio(); ?></p>
                        </div>
                    </li>
                    <li class="<?= empty($detallesDelArtista->getAno_fallecimiento()) ? 'uk-hidden' : '' ?>">
                        <a class="uk-accordion-title" href>Fallecimiento</a>
                        <div class="uk-accordion-content">
                            <p><?= $detallesDelArtista->getAno_fallecimiento(); ?></p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="uk-slider-container-offest uk-padding" uk-slider uk-scrollspy="cls: uk-animation-slide-bottom; target: .uk-card; delay: 300; repeat: true">
            <div class="uk-position-relative uk-visible-toggle" tabindex="-1">
                <div class="uk-slider-items uk-child-width-1-2@s uk-child-width-1-3@m uk-grid">
                <?php foreach($obrasArtista as $obra) {?>
                    <div class="uk-card uk-card-body uk-card-hover uk-padding">
                        <div class="uk-card-media-top uk-text-center">
                            <img class="img-card" src="<?= $obra->getImage(); ?>" alt="<?= $obra->getName() . ", " . $obra->getInforme(); ?>">
                        </div>
                        <div class="uk-card-body">
                            <h3 class="uk-card-title"><?= $obra->getName(); ?></h3>
                            <p><?= $obra->description_reducida(); ?></p>
                            <div class="uk-flex uk-flex-column uk-align-center uk-flex-center">
                                <span><?= $obra->getPublication(); ?></span>
                                <span><?= $obra->getArtista_id()->getName(); ?></span>
                                <span><?= $obra->getCategoria_id()->getName(); ?></span>
                                <span><?= $obra->getColeccion_id()->getName(); ?></span>
                                <?php foreach($obra->getTecnicas() as $tecnica) { ?>
                                    <span><?= $tecnica->getName(); ?></span>
                                <?php } ?>
                            </div>
                            <div class="uk-width-auto uk-text-center uk-align-center">
                                <span class="uk-h3 uk-text-warning"><?= $obra->getFormattedPrice(); ?></span>
                            </div>
                            <div class="uk-width-auto uk-text-center">
                                <a class="uk-button uk-button-text uk-text-large" href="index.php?section=producto&id=<?= $obra->getId() ?>">Comprar</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
                <a class="uk-position-center-left uk-position-small uk-hidden-hover control" href uk-slidenav-previous uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover control" href uk-slidenav-next uk-slider-item="next"></a>
            </div>
            <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
    </div>
</section>