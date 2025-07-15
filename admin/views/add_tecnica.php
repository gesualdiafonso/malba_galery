<?php
$tecnica = Tecnica::getTecnica();

?>

<section class="uk-margin-medium-top uk-margin-large-bottom">
    <form id="formArtista" class="uk-form-stacked uk-padding-small" action="action/add_tecnica_act.php" method="POST" enctype="multipart/form-data">
        <h2 class="uk-heading-line uk-text-center">Control de Creación: Tecnicas</h2>
        <div class="uk-fieldset uk-grid-small" uk-grid>
            <legend class="uk-legend uk-text-center">Informação de la Tecnica que desea a agregar</legend>
            <!-- Campo name -->
            <div class="uk-width-1-1 uk-margin">
                <label for="name" class="uk-form-label"> Nombre de la tecnica a ser Adicionada <span class="uk-text-warning">*</span></label>
                <div class="uk-form-control">
                    <input class="uk-input" type="text" name="name" id="name" maxlength="256" required>
                </div>
            </div>
            <div class="uk-width-1-1">
                    <button type="submit" class="uk-button uk-button-primary uk-width-1-1">Agregar Tecnica</button>
            </div>
        </div>
    </form>
</section>