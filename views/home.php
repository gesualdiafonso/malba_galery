<?php 

$artistas = Artista::artistas();

?>

<section class="uk-animation-fade" >
    <div class="uk-background-fixed uk-background-contain uk-height-medium uk-width-expand uk-flex uk-flex-center uk-flex-middle" style="background-image: url('public/images/malba_exibition.jpg');">
        <div class="uk-text-center uk-height-medium uk-padding-large uk-width-expand uk-overlay-primary">
            <h2 class="uk-heading-primary title"><strong>MALBA</strong> Arte Commerce</h2>
            <p class="uk-text-lead" >Arte latinoamericano al alcance de un clic</p>
            <a class="uk-button uk-button-default" href="index.php?section=galery">Explorar Galería</a>
        </div>
    </div>
</section>

<section class="uk-flex uk-flex-column uk-flex-row@m uk-container">
    <div class="uk-width-1-1@s uk-width-1-2@l uk-padding uk-padding-small uk-padding-remove-vertical uk-flex uk-flex-column uk-flex-center uk-flex-middle">
        <h2 class="uk-heading-line uk-text-center uk-margin-small-top title uk-scrollspy-slide-left" uk-scrollspy="cls: uk-animation-slide-left-medium; repeat: true">Bienvenido a un proyecto MALBA</h2>
        <p class="uk-scrollspy-slide-left" uk-scrollspy="cls: uk-animation-slide-left-medium; repeat: true">Nuestra meta es expandir el alcance de arte latino-americana al ofrecer una plataforma digital exclusiva para la comercialización de las obras de artistas locales.</p>
        <p class="uk-scrollspy-slide-left" uk-scrollspy="cls: uk-animation-slide-left-medium; repeat: true">El e-commerce del MALBA tiene como propósito de valorizar y brindar visibilidad a nuevas expressões artísticas, conectando talentos emergentes y estabelecidos al público.</p>
        <p class="uk-scrollspy-slide-left" uk-scrollspy="cls: uk-animation-slide-left-medium; repeat: true">Esta iniciativa fortalece nuestro ecosistema cultura, promoviendo el reconocimiento y la sustentabilidad de producciones artísticas en Argentina.</p>
    </div>
    <div class="uk-width-1-1@s uk-width-1-2@l uk-padding uk-text-center">
        <img uk-scrollspy="cls: uk-animation-slide-right; repeat: true" class="uk-box-shadow-hover-xlarge uk-box-shadow-hover-xlarge" src="public/images/artistas.jpg" alt="Artistas Reconocidos Argentinos, Christian Montenegro, XUl Solar, Ad Minoliti y Antonio Berni">
    </div>
</section>
<section class="uk-align-center uk-padding uk-container">
    <h2 uk-scrollspy="cls: uk-animation-slide-left-medium; repeat: true" class="uk-text-center">Valor del Proyecto</h2>
    <p uk-scrollspy="cls: uk-animation-slide-right; repeat: true">El comercio electrónico del MALBA amplía el acceso al arte ofreciendo un espacio seguro para la comercialización de obras originales. Además de apoyar económicamente a los artistas locales, la plataforma pone en contacto a coleccionistas y aficionados con la producción artística argentina, reforzando el compromiso del museo con la preservación y el crecimiento de la escena cultural latinoamericana.</p>
</section>
<section class="carousel">
    <div class="uk-padding uk-container">
        <h2 uk-scrollspy="cls: uk-animation-slide-left-medium; repeat: true"  class="uk-heading-medium artist-title uk-text-line uk-text-left uk-padding-large uk-padding-remove-horizontal">Nuestros artistas</h2>
        <div uk-scrollspy="cls: uk-animation-fade; target: .uk-card; delay: 500; repeat: true" class="uk-slider-container-offest" uk-slider>
            <div  class="uk-position-relative uk-visible-toggle" tabindex="-1">
                <div class="uk-slider-items uk-child-width-1-2@s uk-child-width-1-3@m uk-grid">
                    
                    <?php foreach ($artistas as $authores) : ?>
                        <div>
                            <div class="uk-card uk-card-default uk-card-body card-body">
                                <img class="img-card-artist uk-text-center" src="<?= $authores->getImagen() ?>" alt="<?= $authores->getName() ?>">
                                <h3 class="uk-card-title uk-text-center"><?= $authores->getName() ?></h3>
                                <p class="uk-text-default uk-padding-large uk-padding-remove-horizontal"><?= $authores->biografia_reducida()?></p>
                                <a class="uk-button uk-button-text uk-text-large" href="index.php?section=artista&artist=<?= $authores->getId() ?>">Ver mas...</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <a class="uk-position-center-left uk-position-small uk-hidden-hover control" href uk-slidenav-previous uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover control" href uk-slidenav-next uk-slider-item="next"></a>
            </div>
            <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
        </div>
    </div>
</section>
<section>
    <div class="uk-background-fixed uk-background-contain uk-background-center-bottom uk-height-medium uk-width-expand uk-flex uk-flex-center uk-flex-middle" style="background-image: url('public/images/interior_obra.jpg');">
        <div class="uk-text-center uk-height-medium uk-padding-large uk-width-auto">
            <span class="uk-text-default uk-light">Obras de Artes Limitadas</span>
            <h2 class="uk-heading-primary title">Encuentre la arte que mas te conecta!</h2>
            <a class="uk-button uk-button-default uk-light" href="index.php?section=galery">Ver mas...</a>
        </div>
    </div>
</section>