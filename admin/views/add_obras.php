<?php
$categoria = Categoria::all_categoria();
$coleccion = Coleccion::coleccion();
$artista = Artista::artistas();
$tecnica = Tecnica::getTecnica();

// echo "<pre>";
// print_r($coleccion);
// echo "</pre>";

?>

<section class="uk-margin-medium-top uk-margin-large-bottom">
    <form id="formArtista" class="uk-form-stacked uk-padding-small" action="action/add_obra_act.php" method="POST" enctype="multipart/form-data">
        <h2 class="uk-heading-line uk-text-center">Control de Creación: Obras</h2>
        <div class="uk-fieldset uk-grid-small" uk-grid>
            <legend class="uk-legend uk-text-center">Informação de la Obra a agregar</legend>
            <!-- Campo name -->
            <div class="uk-width-1-1 uk-width-1-2@s uk-margin">
                <label for="name" class="uk-form-label"> Nombre *</label>
                <div class="uk-form-control">
                    <input class="uk-input" type="text" name="name" id="name" maxlength="256" required>
                </div>
            </div>
            <!-- Campo imagem -->
            <div class="uk-width-1-1 uk-width-1-2@s uk-margin">
                <label for="image" class="uk-form-label">Imagen *</label>
                <div uk-form-custom="target: true">
                    <input class="" aria-label="Custom controls" type="file" name="image" id="image" accept="image/*" required>
                    <input class="uk-input uk-form-width-large" type="text" placeholder="Seleccione la foto" aria-label="Custom controls" disabled>
                </div>
            </div>

            <!-- Campo de Artistas -->
            <div class="uk-width-1-1 uk-width-1-2@s uk-margin">
                <label for="artista_id" class="uk-form-label"> Selecione el Artista * </label>
                <div class="uk-width-1-1 uk-form-control" uk-form-custom="target: > * > span:first-child">
                    <select name="artista_id" id="artista_id" aria-label="Custom controls">
                        <option value="">Elija un artista</option>
                        <?php foreach($artista as $value){ ?>
                            <option value="<?= $value->getId() ?>"><?= $value->getName()?></option>
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
                        <option value="" selected disabled>Elija una categoria</option>
                        <?php foreach($categoria as $cat) {?>
                            <option value="<?= $cat->getId(); ?>"><?= $cat->getName(); ?></option>
                        <?php } ?>
                    </select>
                    <button class="uk-button uk-button-default uk-padding-remove" type="button" tabindex="-1">
                        <span class="uk-text-small"></span>
                        <span uk-icon="icon: chevron-down"></span>
                    </button>
                </div>
                <div>
                    <p>Caso el campo de categoria no esté para ser selecionada, <a class="uk-link-muted" href="index.php?section=add_categoria">adicionar categoria</a></p>
                </div>
            </div>

            <!-- Campo Description -->
            <div class="uk-width-1-1 uk-width-1-2@s uk-margin">
                <label for="description" class="uk-form-label"> Descrición de la Obra del artista *</label>
                <div class="uk-form-controls">
                    <textarea class="uk-width-expand uk-textarea" name="description" id="description" rows="6" placeholder="Digite la biografia" aria-label="Textarea" style="resize: none" required></textarea>
                </div>
            </div>
            <!-- Campo informe -->
            <div class="uk-width-1-1 uk-width-1-2@s uk-margin">
                <label for="informe" class="uk-form-label"> Informe sobre la Obra *</label>
                <div class="uk-form-controls">
                    <textarea class="uk-width-expand uk-textarea" name="informe" id="informe" rows="6" placeholder="Digite la biografia" aria-label="Textarea" style="resize: none" required></textarea>
                </div>
            </div>
            <!-- Campo publicacion -->
            <div class="uk-width-1-1 uk-width-1-2@s uk-margin">
                <label for="publication" class="uk-form-label"> Año de lanzamiento / de publicación *</label>
                <div>
                    <div class="uk-form-controls">
                        <input type="number" class="uk-input" name="publication" id="publication" min="1700" max="2025">
                    </div>
                </div>
            </div>
            <!-- Campo price -->
            <div class="uk-width-1-1 uk-width-1-2@s uk-margin">
                <label for="price" class="uk-form-label"> Informe el valor de la obra *</label>
                <div>
                    <div class="uk-form-controls">
                        <input type="number" class="uk-input" name="price" id="price">
                    </div>
                </div>
            </div>

            <!-- campo de coleccion -->
            <div class="uk-width-1-1 uk-width-1-2@s uk-margin">
                <label for="coleccion_name" class="uk-form-label"> Informe la colección que hace parte *</label>
                <div class="uk-form-control">
                    <input class="uk-input" type="text" name="coleccion_name" id="coleccion_name" maxlength="256" required>
                </div>
            </div>

            <!-- campo tecnica -->
            <div class="uk-width-1-1 uk-width-1-2@s uk-margin">
                <label class="uk-form-label" for="tecnicas">Selecione as Tecnicas que pertence a Obra</label>
                <div class="uk-form-controls">
                    <select id="tecnicas" multiple name="tecnicas[]">
                        <?php foreach($tecnica as $tec) { ?> 
                            <option value="<?= $tec->getId() ?>"> <?= $tec->getName(); ?> </option>
                        <?php } ?>
                    </select>
                </div>
                <div>
                    <p>Caso el campo de tecnicas no esté alguna especifica para ser selecionada, <a class="uk-link-muted" href="index.php?section=add_tecnica">crear nueva tecica</a></p>
                </div>
            </div>

            <div class="uk-width-1-1">
                    <button type="submit" class="uk-button uk-button-primary uk-width-1-1">Agregar Obras</button>
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