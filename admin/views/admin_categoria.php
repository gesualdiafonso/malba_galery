<?php
$cateogria = Categoria::all_categoria();

?>

<div>
    <div>
        <?= Flags::get_flags(); ?>
    </div>
    <ul uk-accordion>
        <?php foreach ($cateogria as $cat) { 
            //Obtengo las obras de las cateogrias
            $obras = Obras::galeria_x_categoria($cat->getId());
        ?>
            <li>
                <a class="uk-accordion-title accordion" href> <?= $cat->getName(); ?></a>
                <div class="uk-accordion-content">
                    <div class="uk-flex uk-margin">
                        <a class="uk-button uk-button-small uk-button-danger uk-text-center" href="index.php?section=delete_categoria&id=<?= $cat->getId(); ?>">Borrar Categoria</a>
                        <a class="uk-button uk-button-small uk-button-secondary uk-text-center" href="index.php?section=edit_categoria&id=<?= $cat->getId(); ?>">Editar Categoria</a>
                    </div>
                    <div>
                        <p>
                            <strong>Description: </strong> <?= $cat->getDescription(); ?>
                        </p>
                    </div>
                    <div>
                        <div class="uk-card uk-card-default uk-card-body" >
                            <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider="center: true">
                                <a href="index.php?section=admin_obras">
                                    <div class="uk-slider-items uk-margin uk-grid-match uk-width-1-1 uk-width-1-2@m uk-width-1-3@l" uk-grid>
                                        <?php foreach($obras as $obra) {?>
                                            <div class="uk-card uk-card-default">
                                                <div class="uk-card-media-top uk-text-center">
                                                    <img class="image" src="../<?= $obra->getImage(); ?>" alt="<?= $obra->getName() . ", " . $obra->getInforme(); ?>" >
                                                </div>
                                                <div class="uk-card-body">
                                                    <h3 class="uk-card-title"><?= $obra->getName(); ?></h3>
                                                    <h3 class="uk-card-title"><?= $obra->getArtista_id()->getName(); ?></h3>
                                                    <p><?= $obra->getPublication(); ?></p>
                                                    <span><?= $obra->getCategoria_id()->getName(); ?></span>
                                                    <span><?= $obra->getColeccion_id()->getName(); ?></span>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </a>
                                <a class="uk-position-center-left uk-position-small uk-hidden-hover control" href uk-slidenav-previous uk-slider-item="previous"></a>
                                <a class="uk-position-center-right uk-position-small uk-hidden-hover control" href uk-slidenav-next uk-slider-item="next"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        <?php } ?>
    </ul>
</div>