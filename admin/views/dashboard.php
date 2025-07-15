<?php
$allArtista = Artista::artistas();
$allObras = Obras::galeria_completa();
$allCetgoria = Categoria::all_categoria();
$allColeccion = Coleccion::coleccion();
$allTecnica = Tecnica::getTecnica();
?>

<section class="uk-container uk-margin-top">
  <div class="painel-artista">
    <h2 class="uk-heading-divider">Dashboard:</h2>
    <span class="uk-text-muted">Bienvenido al Painel de Control</span>
  </div>

  <div class="uk-divider"></div>

  <!-- Início do Grid geral -->
  <div class="uk-grid-match uk-child-width-1-1 uk-child-width-1-2@m uk-grid-small" uk-grid>
    
    <!-- Painel de Artistas -->
    <div class="uk-width-1-1">
      <div class="uk-card uk-card-default uk-width-1-1" style="max-height: 400px; overflow-y: auto;">
        <div class="uk-card-header uk-flex uk-flex-between uk-flex-wrap">
          <h4 class="uk-card-title">Artistas</h4>
          <a class="uk-button uk-button-small uk-button-default" href="index.php?section=admin_artista">Admin. Artista</a>
        </div>

        <div class="uk-card-body uk-overflow-auto">
          <table class="uk-table uk-table-justify uk-table-divider uk-table-small">
            <thead>
              <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Información</th>
                <th>Crítica y Estilo</th>
                <th>Obras</th>
                <th>Controles</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($allArtista as $artista) {?>
              <tr>
                <td><img class="uk-preserve-width" src="../<?= $artista->getImagen(); ?>" width="100" alt="<?= $artista->getName(); ?>"></td>
                <td data-label="Nombre"><?= $artista->getName(); ?></td>
                <td><?= $artista->biografia_reducida(); ?></td>
                <td>
                  <p><?= $artista->estilo_reducida(); ?></p>
                  <p><?= $artista->critica_reducida(); ?></p>
                </td>
                <td>Contador de obras</td>
                <td class="uk-flex uk-flex-column uk-padding">
                  <a class="uk-button uk-button-small uk-button-danger" href="index.php?section=delete_artista&id=<?= $artista->getId(); ?>">Borrar</a>
                  <a class="uk-button uk-button-small uk-button-secondary" href="index.php?section=edit_artista&id=<?= $artista->getId(); ?>">Editar</a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        
      </div>
      <div class="uk-card-footer">
          <a class="uk-button uk-button-small uk-button-default uk-text-warning" href="index.php?section=add_artista">Crear Artista</a>
        </div>
    </div>

    <!-- Painel de Obras -->
    <div class="">
      <div class="uk-card uk-card-default uk-card-body">
        <h4 class="uk-card-title">Obras</h4>
        <div class="uk-position-relative uk-visible-toggle uk-light" uk-slider="center: true">
          <ul class="uk-slider-items uk-grid-match uk-grid-small" uk-grid>
            <?php foreach($allObras as $obra) { ?>
            <li class="uk-card uk-card-body">
              <div class="uk-card uk-card-default">
                <div class="uk-card-media-top uk-text-center">
                  <img class="image" src="../<?= $obra->getImage(); ?>" alt="<?= $obra->getName(); ?>">
                </div>
                <div class="uk-card-body">
                  <h3 class="uk-card-title"><?= $obra->getName(); ?></h3>
                  <h4 class="uk-text-muted"><?= $obra->getArtista_id()->getName(); ?></h4>
                  <p><?= $obra->getPublication(); ?></p>
                  <span><?= $obra->getCategoria_id()->getName(); ?> | <?= $obra->getColeccion_id()->getName(); ?></span>
                </div>
              </div>
            </li>
            <?php } ?>
          </ul>
          <a class="uk-position-center-left uk-position-small uk-hidden-hover uk-text-emphasis" href uk-slidenav-previous uk-slider-item="previous"></a>
          <a class="uk-position-center-right uk-position-small uk-hidden-hover uk-text-emphasis" href uk-slidenav-next uk-slider-item="next"></a>
        </div>
      </div>
      <div class="uk-margin-top">
        <a class="uk-button uk-button-small uk-button-default uk-text-warning" href="index.php?section=add_obras">Crear Obra</a>
      </div>
    </div>

    <!-- Categorias e Colecciones -->
    <div>
      <div class="uk-card uk-card-default uk-card-body">
        <h4 class="uk-card-title">Categorías Existentes</h4>
        <ul class="uk-list uk-list-bullet">
          <?php foreach($allCetgoria as $categoria){ ?>
          <li><?= $categoria->getName(); ?></li>
          <?php } ?>
        </ul>
        <a class="uk-button uk-button-small uk-button-default uk-text-warning" href="index.php?section=admin_categoria">Admin. Categoria</a>
      </div>

      <div class="uk-card uk-card-default uk-card-body uk-margin-top">
        <h4 class="uk-card-title">Colecciones Existentes</h4>
        <ul class="uk-list uk-list-bullet">
          <?php foreach($allColeccion as $coleccion){ ?>
          <li><?= $coleccion->getName(); ?></li>
          <?php } ?>
        </ul>
      </div>
    </div>
    <!-- Painel de Tecnicas -->
    <div class="uk-width-1-1 uk-margin-top">
      <div class="uk-card uk-card-default uk-card-body">
        <div class="uk-margin-top">
          <h2 class="uk-heading-line uk-text-center uk-heading-divider">Administrador de Tecnicas</h2>
        </div>
        <div class="uk-divider"></div>
        <div class="uk-grid-match" uk-grid>
            <?php foreach($allTecnica as $tec) { ?>
                <div>
                    <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                        <h3 class="uk-card-title"><?= $tec->getName(); ?></h3>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="uk-card-footer">
          <a class="uk-button uk-button-small uk-button-default uk-text-warning" href="index.php?section=add_tecnica">Crear Nueva Tecnica</a>
        </div>
      </div>
    </div>
  </div>
</section>