<?php
$tecnicaId = Tecnica::getTecnica();
?>

<section class="uk-margin-medium-top uk-margin-large-bottom">
    <form id="formArtista" class="uk-form-stacked uk-padding-small" action="action/edit_tecnica_act.php" method="POST" enctype="multipart/form-data">
        <div class="uk-width-1-1 uk-margin">
            <label for="id" class="uk-form-label"> Selecione la Tecnica a ser editada * </label>
            <div class="uk-width-1-1 uk-form-control" uk-form-custom="target: > * > span:first-child">
                <select name="id" id="id" aria-label="Custom controls">
                    <option selected>Seleccione una tecnica para editar</option>
                    <?php foreach($tecnicaId as $tec) { ?>
                        <option value="<?= $tec->getId()?>"> <?= $tec->getName()?></option>
                    <?php } ?>
                </select>
                <button class="uk-button uk-button-default uk-padding-remove" type="button" tabindex="-1">
                    <span class="uk-text-small"></span>
                    <span uk-icon="icon: chevron-down"></span>
                </button>
            </div>
        </div>
        <div class="uk-width-1-1 uk-margin">
            <label for="name" class="uk-form-label"> Nombre *</label>
            <div class="uk-form-control">
                <input class="uk-input" type="text" name="name" id="name" maxlength="256" required >
            </div>
        </div>
        <div class="uk-width-1-1">
                <button type="submit" class="uk-button uk-button-primary uk-width-1-1">Editar Tecnica</button>
        </div>
    </form>
</section>