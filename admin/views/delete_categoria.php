<?php
$id = $_GET['id'] ?? FALSE;

$categoria = Categoria::getCategoriaId($id);

?>

<section>
    <h2 class="uk-heading-large uk-text-center">¿Tiene certeza que desea <strong>borrar</strong> esta Categoria?</h2>
    <div class="uk-grid-large uk-flex-middle" uk-grid>
        <div class="uk-width-1-1">
            <h2 class="uk-heading-bullet"><?= $categoria->getName(); ?></h2>
            <p class="uk-text-muted"><?= $categoria->getDescription(); ?></p>
        </div>
    </div>
    <div class="uk-width-1-1">
        <a class="uk-button uk-button-small uk-button-default uk-text-center" href="action/delete_categoria_act.php?id=<?= $categoria->getId(); ?>">Borrar Categoria</a>
    </div>
</section>