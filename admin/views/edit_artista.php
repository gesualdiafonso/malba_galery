<?php
$id = $_GET['id'] ?? FALSE;

$artista = Artista::getById($id);


// echo "<pre>";
// print_r($artista);
// echo "</pre>";

// Con la lógica aplicada neseito decir a la variable que, como no tengo array y si un objeto, que me retorne el Objecto por lo tanto paso segundo valor a false
$detalles = DetallesArtista::getById($id);


// echo "<pre>";
// var_dump($detalles);
// echo "</pre>";

?>

<section class="uk-margin-medium-top uk-margin-large-bottom">
    <form id="formArtista" class="uk-form-stacked uk-padding-small" action="action/edit_artista_act.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $artista->getId(); ?>">
        <h2 class="uk-heading-line uk-text-center">Edición de personaje</h2>
        <div class="uk-fieldset uk-grid-small" uk-grid>
            <legend class="uk-legend uk-text-center">Informação sobre <strong><?= $artista->getName(); ?></strong></legend>
            <!-- Campo name -->
            <div class="uk-width-1-1 uk-width-1-2@s">
                <label for="name" class="uk-form-label"> Nombre *</label>
                <div class="uk-form-control">
                    <input class="uk-input" type="text" name="name" id="name" maxlength="256" required value="<?= $artista->getName(); ?>">
                </div>
            </div>
            <!-- Campo estilo -->
            <div class="uk-width-1-1 uk-width-1-2@s">
                <label for="estilo" class="uk-form-label"> Estilo Artistico *</label>
                <div class="uk-form-control">
                    <input class="uk-input" type="text" name="estilo" id="estilo" maxlength="256" required value="<?= $artista->getEstilo(); ?>">
                </div>
            </div>
            <!-- Campo critica -->
            <div class="uk-width-1-1 uk-width-1-2@s">
                <label for="critica" class="uk-form-label"> Estilo Artistico *</label>
                <div class="uk-form-control">
                    <input class="uk-input" type="text" name="critica" id="critica" maxlength="256" required value="<?= $artista->getCritica(); ?>">
                </div>
            </div>
            <!-- Campo imagem -->
            <div class="uk-width-1-1 ">
                <label for="imagen" class="uk-form-label">Imagen *</label>
                <div class="uk-width-1-1" uk-grid>
                    <div class="uk-width-1-1 " uk-form-custom="target: true" uk-grid>
                        <div class="uk-width-1-1 uk-width-1-2@s uk-text-center">
                            <img class="uk-preserve-width" src="../<?= $artista->getImagen(); ?>" width="50%" height="250" alt="<?= $artista->getName(); ?>">
                        </div>
                        <div class="uk-width-1-1 uk-width-1-2@s uk-align-center">
                            <input class="" aria-label="Custom controls" type="hidden" name="imagen" id="imagen" accept="image/*" value="<?= $artista->getImagen(); ?>" disabled>
                            <input class="uk-input uk-form-width-large" type="text" placeholder="<?= $artista->getName(); ?>" aria-label="Custom controls" disabled value="<?= $artista->getImagen(); ?>">
                            <div class="uk-width-1-1 uk-margin">
                                <label for="imagen" class="uk-form-label">Reemplazar Imagen</label>
                                <div uk-form-custom="target: true">
                                    <input class="" aria-label="Custom controls" type="file" name="imagen" id="imagen" accept="image/*"">
                                    <input class="uk-input uk-form-width-large" type="text" placeholder="Seleccione la foto" aria-label="Custom controls" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Biografy -->
            <div class="uk-width-1-1">
                <label for="biografy">Biografía *</label>
                <div class="uk-form-controls">
                    <textarea class="uk-width-expand uk-textarea" name="biografy" id="biografy" rows="6" placeholder="Digite la biografia" aria-label="Textarea" style="resize: none" required ><?= $artista->getBiografy(); ?></textarea>
                </div>
            </div>
        </div>
        <?php if (!$detalles): ?>
            <div class="uk-margin">
                <p class="uk-heading-small">
                    <strong>Estamos con un error!</strong> Por algun erro al crear el artista, usted puede haber olvidade de completar el campo de detalles. Borre este artista y crie otro nuevamente, preenchendo el campus de detalles que son obligatorios!
                </p>
                <a class="uk-button uk-button-small uk-button-danger uk-text-center" href="index.php?section=delete_artista&id=<?= $artista->getId(); ?>">Borrar Artista</a>
            </div>
        <?php else: ?>
            <h2 class="uk-heading-line uk-text-center">Edición de Detalles de <?= $artista->getName(); ?></h2>
            <div class="uk-fieldset uk-grid-small" uk-grid>
                <legend class="uk-legend uk-text-center">Informação de los detalles</legend>
                <!-- Campo name -->
                <div class="uk-width-1-1 uk-width-1-2@s">
                    <label for="premiacion" class="uk-form-label"> Premiaciones que participaste </label>
                    <div class="uk-form-control">
                        <input class="uk-input" type="text" name="premiacion" id="premiacion" maxlength="256" value="<?= $detalles->getPremiacion();?>">
                    </div>
                </div>
                <!-- Campo Nacionalidad -->
                <div class="uk-width-1-1 uk-width-1-2@s">
                    <label for="nacionalidad" class="uk-form-label"> Nacionalidad del Artista *</label>
                    <div class="uk-form-control">
                        <input class="uk-input" type="text" name="nacionalidad" id="nacionalidad" maxlength="256" required value="<?= $detalles->getNacionalidad();?>">
                    </div>
                </div>
                <!-- Campo de Fechas de inicio y fallecimiento -->
                <div class="uk-width-1-1 uk-width-1-2@s uk-grid">
                    <div class="uk-width-1-1 uk-width-1-2@s">
                        <label for="ano_inicio" class="uk-form-label">Año que empezaste sus actividades</label>
                        <div>
                            <div class="uk-form-controls">
                                <input type="number" class="uk-input" name="ano_inicio" id="ano_inicio" min="1700" max="2025" value="<?= $detalles->getAno_inicio();?>">
                            </div>
                        </div>
                    </div>
                    <div class="uk-width-1-1 uk-width-1-2@s">
                        <label for="ano_fallecimiento" class="uk-form-label">Año que empezaste sus actividades</label>
                        <div>
                            <div class="uk-form-controls">
                                <input type="number" class="uk-input" name="ano_fallecimiento" id="ano_fallecimiento" min="1700" max="2025" value="<?= $detalles->getAno_fallecimiento();?>">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Campo Curiosidad -->
                <div class="uk-width-1-1">
                    <label for="curiosidad" class="uk-form-label"> Curiosdiad sobre el artista *</label>
                    <div class="uk-form-controls">
                        <textarea class="uk-width-expand uk-textarea" name="curiosidad" id="curiosidad" rows="6" aria-label="Textarea" style="resize: none" required><?= $detalles->getCuriosidad();?></textarea>
                    </div>
                </div>
                
                <div class="uk-width-1-1">
                        <button type="submit" class="uk-button uk-button-primary uk-width-1-1">Editar Artista</button>
                </div>
            </div>
        <?php endif; ?>
    </form>
</section>