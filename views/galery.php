<?php 

$tecnica = Tecnica::getTecnica();
$collecion = Coleccion::coleccion();

// Obras entre $70.000 e $100.000, do mais caro para o mais barato
// $obrasFiltradas = Obras::galeriaPrecioRango(70000, 100000, 'DESC');

// Obras entre $0 e $69.000, do mais barato para o mais caro
// $obrasFiltradasBaratas = Obras::galeriaPrecioRango(0, 69000, 'ASC');


// echo "<pre>";
// print_r($idTecnica);
// echo "</pre>";

// echo "<pre>";
// print_r($tecnica);
// echo "</pre>";

// echo "<pre>";
// print_r($obrasFiltradas);
// echo "</pre>";

// echo "<pre>";
// print_r($obrasFiltradasBaratas);
// echo "</pre>";


?>

<section class="uk-container">
    <h2 class="title-galery" uk-scrollspy="cls: uk-animation-slide-left; repeat: true">Galeria de Colección, Artes, Esculturas, Posters, Ventas...</h2>
    <div class="line-decor" uk-scrollspy="cls: uk-animation-slide-right; repeat: true"></div>

    <div class="uk-animation-fade">
        <form class="uk-child-width-1-3 uk-grid-small uk-text-center" uk-grid>
            <div >
                <div uk-form-custom="target: > * > span:first-child">
                    <select name="tecnica" id="tecnica_id" aria-label="Custom controls">
                        <option value="">Todas las tecnicas</option>
                        <?php foreach($tecnica as $value){ ?>
                            <option value="<?= $value->getId() ?>"><?= $value->getName()?></option>
                        <?php } ?>
                    </select>
                    <button class="uk-button uk-button-default" type="button" tabindex="-1">
                        <span></span>
                        <span uk-icon="icon: chevron-down"></span>
                    </button>
                </div>
            </div>
            <div >
                <div uk-form-custom="target: > * > span:first-child">
                    <select name="coleccion" id="coleccion_id" aria-label="Custom controls">
                        <option value="">Toda las Colecciones</option>
                        <?php foreach($collecion as $value){ ?>
                            <option value="<?= $value->getId() ?>"><?= $value->getName()?></option>
                        <?php } ?>
                    </select>
                    <button class="uk-button uk-button-default" type="button" tabindex="-1">
                        <span></span>
                        <span uk-icon="icon: chevron-down"></span>
                    </button>
                </div>
            </div>
            <div>
                <div uk-form-custom="target: > * > span:first-child">
                    <select name="precio_rango" id="precio_rango" aria-label="Custom controls">
                        <option value="">Todos los precios</option>
                        <option value="0-69000">hasta $69.000</option>
                        <option value="70000-100000">De $70.000 hasta $100.000</option>
                        <option value="100001-99999999">arriba de $100.000</option>
                    </select>
                    <button class="uk-button uk-button-default" type="button" tabindex="-1">
                        <span></span>
                        <span uk-icon="icon: chevron-down"></span>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="uk-child-width-1-4 uk-grid-small uk-margin-auto uk-animation-slide-top" uk-grid>

        <?php foreach($galeriaCompleta as $obra) { ?>
            <?php 
                $idTecnica = GaleriaTecnica::getTecnicasByObra($obra->getId());
                $dataTecnica = implode(',', $idTecnica);    
            ?>
            <div 
                class="uk-card uk-card-defaul uk-card-body uk-card-hover uk-width-1-2@s uk-width-1-3@m uk-width-1-4@l uk-padding uk-align-center"
                data-coleccion="<?= $obra->getColeccion_id()->getId(); ?>"
                data-tecnica="<?= $dataTecnica ?>"
                data-precio="<?= number_format($obra->getPrice(), 0, '', '') ?>"
                >
                <div class="uk-card-media-top uk-text-center">
                    <img class="img-card" src="<?= $obra->getImage(); ?>"  alt="<?= $obra->getName() . ", " . $obra->getInforme(); ?>">
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
</section>