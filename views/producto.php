<?php

if (isset($_GET['id'])) {
    $obraId = (int) $_GET['id'];
    $obrasId = Obras::galeria_id($obraId);

    if (!$obrasId) {
        echo "<p>Obra no encontrada.</p>";
        return; // ou exit;
    }

} else {
    echo "<p>ID seleccionado no fue encontrado.</p>";
    return; // ou exit;
}

// if (isset($_GET['id'])) {
//     $obraId = $_GET['id']; // segurança: sempre converta para inteiro
// } else{
//     echo "<p>ID seleccionado no fue encontrado.</p>";
// }

// $obrasId = Obras::galeria_id($obraId);


?>

<section class="uk-container">
    <div class="card">
        <div class="card-image uk-width-1-1 uk-width-1-2@m">
            <img class="card-img" src="<?= $obrasId->getImage(); ?>" alt="<?php echo $obrasId->getName() . ", " . $obrasId->getInforme(); ?>">
        </div>
        <div class="uk-width-1-1 uk-width-1-2@m">
            <div class="body-card">
                <h2 class="card-title"><?= $obrasId->getName(); ?></h2>
                <p class="card-descrpt"><?= $obrasId->getDescription() . " " . "De" . " " . $obrasId->getArtista_id()->getName(); ?></p>
                <h3 class="card-publi"><?= $obrasId->getPublication(); ?></h3>
                <div class="uk-flex uk-flex-column uk-align-center uk-flex-center">
                        <p><?= $obrasId->getCategoria_id()->getName(); ?></p>
                        <p><?= $obrasId->getColeccion_id()->getName(); ?></p>
                        <?php foreach($obrasId->getTecnicas() as $tecnica) { ?>
                            <p><?= $tecnica->getName(); ?></p>
                        <?php } ?>
                    </div>
                <span class="uk-h3 uk-text-warning"><?= $obrasId->getFormattedPrice(); ?></span>
            </div>
            <div class="card-links">
                <a class="uk-button uk-button-text uk-text-large" href="index.php?section=artista&artist=<?= $obrasId->getArtista_id()->getId(); ?>">Información del Artista...</a>
            </div>
            <div class="uk-margin">
                <form action="admin/action/add_item_act.php" method="GET" class="" uk-grid>
                    <div class="uk-width-1-1 uk-width-1-2@m">
                        <label for="cantidad" class="uk-text-bold uk-legend">Cantidad:</label>
                        <input type="number" name="cantidad" id="cantidad" value="1" min="1" max="10" class="uk-input uk-form-width-small">
                    </div>
                    <div class="uk-width-1-1 uk-width-1-2@m">
                        <input type="submit" value="AGREGAR A CARRITO" class="uk-button uk-button-danger uk-text-medium">
                        <input type="hidden" value="<?= $obraId ?>" name="id" id="id">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
