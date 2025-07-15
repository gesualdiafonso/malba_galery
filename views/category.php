<?php 

$obras = Obras::galeria_x_categoria($filter);

$categoria = Categoria::getCategoriaId($filter);


// echo "<pre>";
// print_r($obras);
// echo "</pre>";

?>
<section class="uk-container">
    <h2 uk-scrollspy="cls: uk-animation-slide-left; repeat: true">Nuestra sección de <strong><?= $categoria->getName(); ?></strong></h2>
    <p uk-scrollspy="cls: uk-animation-slide-right; repeat: true"><?= $categoria->getDescription(); ?></p>
    <div class="line-decor" uk-scrollspy="cls: uk-animation-slide-left; repeat: true"></div>
    <div class="uk-child-width-1-4 uk-grid-small uk-margin-auto uk-animation-slide-top" uk-grid >

        <?php foreach($obras as $obra) {?>
            <div class="uk-card uk-card-defaul uk-card-body uk-card-hover uk-width-1-2@s uk-width-1-3@m uk-width-1-4@l uk-padding uk-align-center">
                <div class="uk-card-media-top uk-text-center">
                    <img  class="img-card" src="<?= $obra->getImage(); ?>" alt="<?= $obra->getName() . ", " . $obra->getInforme(); ?>">
                </div>
                <div class="uk-card-body">
                    <h3 class="uk-card-title"><?= $obra->getName(); ?></h3>
                    <div class="">
                        <h4><?= $obra->getArtista_id()->getName(); ?></h4>
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
</section>
