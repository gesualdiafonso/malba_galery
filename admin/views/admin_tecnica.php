<?php
$tecnicas = Tecnica::getTecnica();

?>

<section >
    <div>
        <h2 class="uk-heading-line uk-text-center uk-heading-divider">Administrador de Tecnicas</h2>
    </div>
    <div>
        <?= Flags::get_flags(); ?>
    </div>
    <div class="uk-divider"></div>
    <div class="uk-grid-match" uk-grid>
        <?php foreach($tecnicas as $tec) { ?>
            <div>
                <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                    <h3 class="uk-card-title"><?= $tec->getName(); ?></h3>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="uk-margin-top">
        <a class="uk-button uk-button-small uk-button-default uk-text-warning" href="index.php?section=add_tecnica">Crear Tecnica Nueva</a>
        <a class="uk-button uk-button-small uk-button-secondary" href="index.php?section=edit_tecnica">Editar Tecnica</a>
        <a class="uk-button uk-button-small uk-button-danger" href="index.php?section=delete_tecnica">Deletar Tecnica</a>
    </div>
</section>