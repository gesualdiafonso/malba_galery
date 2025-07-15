<?php
$id = $_GET['id'] ?? FALSE;

$obraId = Obras::galeria_id($id);

$categoria = Categoria::all_categoria();
$coleccion = Coleccion::coleccion();
$artista = Artista::artistas();
$tecnica = Tecnica::getTecnica();


// Neceito mostrar todas las tecnicas disponibles 
// desúes marcar con select aquellas que esté vinculadas a la obra via getTecnicas usando un ternario adentro de options 
// Evitar un fata error y uso un in_array para comparar los Ids correctamente
$tecnicaSelecionada = $obraId->getTecnicas();
$idSelecionados = array_map(function($tec) {
    return $tec->getId();
}, $tecnicaSelecionada);

// echo "<pre>";
// print_r($obraId);
// echo "</pre>";

?>

<section class="uk-margin-medium-top uk-margin-large-bottom">
    
    <form id="formArtista" class="uk-form-stacked uk-padding-small" action="action/edit_obra_act.php" method="POST" enctype="multipart/form-data">
        <h2 class="uk-heading-line uk-text-center">Edit obra <?= $obraId->getName(); ?></h2>
        <div class="uk-fieldset uk-grid-small" uk-grid>
            <legend class="uk-legend uk-text-center">Informação de la Obra</legend>
            <!-- Campo name -->
            <div class="uk-width-1-1 uk-margin">
                <label for="name" class="uk-form-label"> Nombre *</label>
                <div class="uk-form-control">
                    <input type="hidden" name="id" value="<?= $obraId->getId() ?>">
                    <input class="uk-input" type="text" name="name" id="name" maxlength="256" required value="<?= $obraId->getName() ?>">
                </div>
            </div>
            <!-- Campo imagem -->
            <div class="uk-width-1-1">
                <label for="image" class="uk-form-label">Imagen *</label>
                <div class="uk-width-1-1" uk-grid>
                    <div class="uk-width-1-1 " uk-form-custom="target: true" uk-grid>
                        <div class="uk-width-1-1 uk-width-1-2@s uk-text-center">
                            <img class="uk-preserve-width" src="../<?= $obraId->getImage(); ?>" width="50%" height="250" alt="<?= $obraId->getName(); ?>">
                        </div>
                        <div class="uk-width-1-1 uk-width-1-2@s uk-align-center">
                            <input class="" aria-label="Custom controls" type="hidden" name="image" id="image" accept="image/*" value="<?= $obraId->getImage(); ?>" disabled>
                            <input class="uk-input uk-form-width-large" type="text" placeholder="<?= $obraId->getName(); ?>" aria-label="Custom controls" disabled value="<?= $obraId->getImage(); ?>">
                            <div class="uk-width-1-1 uk-margin">
                                <label for="image" class="uk-form-label">Reemplazar Imagen</label>
                                <div uk-form-custom="target: true">
                                    <input class="" aria-label="Custom controls" type="file" name="image" id="image" accept="image/*"">
                                    <input class="uk-input uk-form-width-large" type="text" placeholder="Seleccione la foto" aria-label="Custom controls" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Campo de Artistas -->
            <div class="uk-width-1-1 uk-width-1-2@s uk-margin">
                <label for="artista_id" class="uk-form-label"> Selecione el Artista * </label>
                <div class="uk-width-1-1 uk-form-control" uk-form-custom="target: > * > span:first-child">
                    <select name="artista_id" id="artista_id" aria-label="Custom controls">
                        <?php foreach($artista as $art) { ?>
                            <option value="<?= $art->getId() ?>" <?= $art->getId() == $obraId->getArtista_id()->getId() ? "selected" : "" ?>><?= $art->getName() ?></option>
                        <?php } ?>
                    </select>
                    <button class="uk-button uk-button-default uk-padding-remove" type="button" tabindex="-1">
                        <span class="uk-text-small"></span>
                        <span uk-icon="icon: chevron-down"></span>
                    </button>
                </div>
            </div>
            <!-- Campo categoria -->
            <div class="uk-width-1-1 uk-width-1-2@s uk-margin">
                <label for="categoria_id" class="uk-form-label"> Seleccione la Categoria * </label>
                <div class="uk-width-1-1" uk-form-custom="target: > * > span:first-child">
                    <select name="categoria_id" id="categoria_id" aria-label="Custom controls" required>
                    <?php foreach($categoria as $cat) { ?>
                            <option value="<?= $cat->getId() ?>" <?= $cat->getId() == $obraId->getCategoria_id()->getId() ? "selected" : "" ?>><?= $cat->getName() ?></option>
                        <?php } ?>
                    </select>
                    <button class="uk-button uk-button-default uk-padding-remove" type="button" tabindex="-1">
                        <span class="uk-text-small"></span>
                        <span uk-icon="icon: chevron-down"></span>
                    </button>
                </div>
            </div>

            <!-- Campo Description -->
            <div class="uk-width-1-1 uk-width-1-2@s uk-margin">
                <label for="description" class="uk-form-label"> Descrición de la Obra del artista *</label>
                <div class="uk-form-controls">
                    <textarea class="uk-width-expand uk-textarea" name="description" id="description" rows="6" placeholder="Digite la biografia" aria-label="Textarea" style="resize: none" required><?= $obraId->getDescription(); ?></textarea>
                </div>
            </div>
            <!-- Campo informe -->
            <div class="uk-width-1-1 uk-width-1-2@s uk-margin">
                <label for="informe" class="uk-form-label"> Informe sobre la Obra *</label>
                <div class="uk-form-controls">
                    <textarea class="uk-width-expand uk-textarea" name="informe" id="informe" rows="6" placeholder="Digite la biografia" aria-label="Textarea" style="resize: none" required><?= $obraId->getInforme(); ?></textarea>
                </div>
            </div>
            <!-- Campo publicacion -->
            <div class="uk-width-1-1 uk-width-1-2@s uk-margin">
                <label for="publication" class="uk-form-label"> Año de lanzamiento / de publicación *</label>
                <div>
                    <div class="uk-form-controls">
                        <input type="number" class="uk-input" name="publication" id="publication" min="1700" max="2025" value="<?= $obraId->getPublication(); ?>">
                    </div>
                </div>
            </div>
            <!-- Campo price -->
            <div class="uk-width-1-1 uk-width-1-2@s uk-margin">
                <label for="price" class="uk-form-label"> Informe el valor de la obra *</label>
                <div>
                    <div class="uk-form-controls">
                        <input type="number" class="uk-input" name="price" id="price" value="<?= $obraId->getPrice(); ?>">
                    </div>
                </div>
            </div>

            <!-- campo de coleccion -->
            <div class="uk-width-1-1 uk-width-1-2@s uk-margin">

                <label for="coleccion_name" class="uk-form-label"> Informe la colección que hace parte *</label>
                <div class="uk-form-control">
                    <input class="uk-input" type="text" name="coleccion_name" id="coleccion_name" maxlength="256" required value="<?= $obraId->getColeccion_id()->getName(); ?>">
                </div>
            </div>

            <!-- campo tecnica -->
            <div class="uk-width-1-1 uk-width-1-2@s uk-margin">
                <label class="uk-form-label" for="tecnicas">Selecione las Tecnicas que pertenece a la Obra</label>
                <div class="uk-form-controls">
                    <select id="tecnicas" multiple name="tecnicas[]">
                        <?php foreach($tecnica as $tec) { ?>
                            <option value="<?= $tec->getId() ?>" <?= in_array($tec->getId(), $idSelecionados) ? "selected" : "" ?> > <?= $tec->getName() ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="uk-width-1-1">
                    <button type="submit" class="uk-button uk-button-primary uk-width-1-1">Editar Obras</button>
            </div>
        </div>
    </form>
</section>

<!-- JavaScript para el Select multriple por ayuda de Choice.js -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script>
    new Choices('#tecnicas', {
        removeItemButton: true,
        shouldSort: false,
    });
</script>