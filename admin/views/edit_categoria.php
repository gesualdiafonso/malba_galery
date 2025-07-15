<?php
$id = $_GET['id'] ?? FALSE;

$categoria = Categoria::getCategoriaId($id);

?>

<section class="uk-margin-medium-top uk-margin-large-bottom">
    <form id="formArtista" class="uk-form-stacked uk-padding-small" action="action/edit_categoria_act.php" method="POST" enctype="multipart/form-data">
        <h2 class="uk-heading-line uk-text-center">Control de Creación: Obras</h2>
        <div class="uk-fieldset uk-grid-small" uk-grid>
            <legend class="uk-legend uk-text-center">Informação de la Obra a agregar</legend>
            <!-- Campo name -->
            <div class="uk-width-1-1 uk-margin">
                <label for="name" class="uk-form-label"> Nombre *</label>
                <div class="uk-form-control">
                    <input type="hidden" name="id" value="<?= $categoria->getId(); ?>">
                    <input class="uk-input" type="text" name="name" id="name" maxlength="256" required value="<?= $categoria->getName(); ?>">
                </div>
            </div>

            <!-- Campo Description -->
            <div class="uk-width-1-1">
                <label for="description" class="uk-form-label"> Descripción sobre la categoria inserida *</label>
                <div class="uk-form-controls">
                    <textarea class="uk-width-expand uk-textarea" name="description" id="description" rows="6" placeholder="Digite la biografia" aria-label="Textarea" style="resize: none" required><?= $categoria->getDescription(); ?></textarea>
                </div>
            </div>
            <div class="uk-width-1-1">
                    <button type="submit" class="uk-button uk-button-primary uk-width-1-1">Editar Categoria</button>
            </div>
        </div>
    </form>
</section>