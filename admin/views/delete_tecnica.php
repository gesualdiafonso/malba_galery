<?php
$tecnica = Tecnica::getTecnica();
?>

<section class="uk-margin-medium-top uk-margin-large-bottom">
    <form id="formArtista" class="uk-form-stacked uk-padding-small" action="action/delete_tecninca_act.php" method="POST" enctype="multipart/form-data">
        <div class="uk-width-1-1 uk-margin">
            <label for="id" class="uk-form-label"> Selecione la Tecnica a ser <strong class="uk-text-warning">DELETADA</strong> * </label>
            <div class="uk-width-1-1 uk-form-control" uk-form-custom="target: > * > span:first-child">
                <select name="id" id="id" aria-label="Custom controls">
                    <option selected>Seleccione una tecnica para editar</option>
                    <?php foreach($tecnica as $tec) { ?>
                        <option value="<?= $tec->getId()?>"> <?= $tec->getName()?></option>
                    <?php } ?>
                </select>
                <button class="uk-button uk-button-default uk-padding-remove" type="button" tabindex="-1">
                    <span class="uk-text-small"></span>
                    <span uk-icon="icon: chevron-down"></span>
                </button>
            </div>
        </div>
        <div class="uk-width-1-1">
                <button type="submit" class="uk-button uk-button-primary uk-width-1-1">Deletar Tecnica</button>
        </div>
    </form>
</section>