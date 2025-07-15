<?php

?>

<section class="uk-margin-medium-top uk-margin-large-bottom">
    <div>
        <?= Flags::get_flags(); ?>
    </div>
    <form id="formArtista" class="uk-form-stacked uk-padding-small" action="action/add_artista_act.php" method="POST" enctype="multipart/form-data">
        <h2 class="uk-heading-line uk-text-center">Control de Creación: Artista</h2>
        <div class="uk-fieldset uk-grid-small" uk-grid>
            <legend class="uk-legend uk-text-center">Informação del Artista</legend>
            <!-- Campo name -->
            <div class="uk-width-1-1 uk-width-1-2@s">
                <label for="name" class="uk-form-label"> Nombre del/la artista<strong class="uk-text-danger">*</strong></label>
                <div class="uk-form-control">
                    <input class="uk-input" type="text" name="name" id="name" maxlength="256" required>
                </div>
            </div>
            <!-- Campo estilo -->
            <div class="uk-width-1-1 uk-width-1-2@s">
                <label for="estilo" class="uk-form-label"> Estilo Artistico <strong class="uk-text-danger">*</strong></label>
                <div class="uk-form-control">
                    <input class="uk-input" type="text" name="estilo" id="estilo" maxlength="256" required>
                </div>
            </div>
            <!-- Campo critica -->
            <div class="uk-width-1-1 uk-width-1-2@s">
                <label for="critica" class="uk-form-label"> A que se criticaba la artista? <strong class="uk-text-danger">*</strong></label>
                <div class="uk-form-control">
                    <input class="uk-input" type="text" name="critica" id="critica" maxlength="256" required>
                </div>
            </div>
            <!-- Campo imagem -->
            <div class="uk-width-1-1 uk-width-1-2@s">
                <label for="imagen" class="uk-form-label">Imagen de la Artista <strong class="uk-text-danger">*</strong></label>
                <div uk-form-custom="target: true">
                    <input class="" aria-label="Custom controls" type="file" name="imagen" id="imagen" accept="image/*" required>
                    <input class="uk-input uk-form-width-large" type="text" placeholder="Seleccione la foto" aria-label="Custom controls" disabled>
                </div>
            </div>
            <!-- Biografy -->
            <div class="uk-width-1-1">
                <label for="biografy">Biografía <strong class="uk-text-danger">*</strong></label>
                <div class="uk-form-controls">
                    <textarea class="uk-width-expand uk-textarea" name="biografy" id="biografy" rows="6" placeholder="Digite la biografia" aria-label="Textarea" style="resize: none" required></textarea>
                </div>
            </div>
        </div>
        <h2 class="uk-heading-line uk-text-center">Control de Detalles del Artista</h2>
        <div class="uk-fieldset uk-grid-small" uk-grid>
            <legend class="uk-legend uk-text-center">Informação de los dettalles</legend>
            <!-- Campo premiacion -->
            <div class="uk-width-1-1 uk-width-1-2@s">
                <label for="premiacion" class="uk-form-label"> Premiaciones que participaste, <strong>en caso de muchos, por favor poner en ","</strong>!</label>
                <div class="uk-form-control">
                    <input class="uk-input" type="text" name="premiacion" id="premiacion" maxlength="256" >
                </div>
            </div>
            <!-- Campo Nacionalidad -->
            <div class="uk-width-1-1 uk-width-1-2@s">
                <label for="nacionalidad" class="uk-form-label"> Nacionalidad del Artista <strong class="uk-text-danger">*</strong></label>
                <div class="uk-form-control">
                    <input class="uk-input" type="text" name="nacionalidad" id="nacionalidad" maxlength="256" required>
                </div>
            </div>
            <!-- Campo de Fechas de inicio y fallecimiento -->
            <div class="uk-width-1-1 uk-width-1-2@s uk-grid">
                <div class="uk-width-1-1 uk-width-1-2@s">
                    <label for="ano_inicio" class="uk-form-label">Año que empezaste a desarrollar sus actividades artisticas <strong class="uk-text-danger">*</strong></label>
                    <div>
                        <div class="uk-form-controls">
                            <input type="number" class="uk-input" name="ano_inicio" id="ano_inicio" min="1910" max="2025" require>
    
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-1 uk-width-1-2@s">
                    <label for="ano_fallecimiento" class="uk-form-label">Si caso el artista haya fallecido, preencher este campo con la fecha informativa!</label>
                    <div>
                        <div class="uk-form-controls">
                            <input type="number" class="uk-input" name="ano_fallecimiento" id="ano_fallecimiento" min="1700" max="2025">
                        </div>
                    </div>
                </div>
            </div>
            <!-- Campo Curiosidad -->
            <div class="uk-width-1-1">
                <label for="curiosidad" class="uk-form-label"> Curiosdiad sobre el artista <strong class="uk-text-danger">*</strong></label>
                <div class="uk-form-controls">
                    <textarea class="uk-width-expand uk-textarea" name="curiosidad" id="curiosidad" rows="6" placeholder="Digite la biografia" aria-label="Textarea" style="resize: none" required></textarea>
                </div>
            </div>
            
            <div class="uk-width-1-1">
                    <button type="submit" class="uk-button uk-button-primary uk-width-1-1">Agregar Artista</button>
            </div>
        </div>
    </form>
</section>