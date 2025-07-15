<?php

$portada = "Imagen del desarrollador de la Web";
$developer = [
    'name' => 'Afonso Arruda Gesualdi',
    'date' => '<strong>24/02/2001</strong>',
    'email' => 'gesualdiafonsoarr@gmail.com',
    'image' => 'public/images/foto200x200.jpg',
]

?>

<section class="developer-section uk-container">
    <div class="uk-container">
        <div class="uk-grid-small uk-child-width-1-1 uk-child-width-1-2@s developer-grid" uk-grid>
            <div class="developer-photo uk-text-center" uk-scrollspy="cls: uk-animation-slide-left; repeat: true">
                <img src="<?= $developer['image'] ?>" alt="<?= $portada ?>" width="200" height="200">
            </div>
            <div class="developer-info" uk-scrollspy="cls: uk-animation-slide-right; repeat: true">
                <span style="text-transform: uppercase; letter-spacing: 2px; font-size: 0.75rem;">Desarrollador</span>
                <h2><?= $developer['name'] ?></h2>
                <p>Fecha de Nacimiento: <?= $developer['date'] ?></p>
                <a class="uk-button-text" href="mailto:<?= $developer['email'] ?>"><?= $developer['email'] ?></a>
                <div class="uk-margin-small-top uk-flex uk-flex-center uk-flex-left@m uk-flex-wrap uk-grid-small" uk-grid>
                    <div><a class="uk-icon-button" uk-icon="icon: github" href="#" target="_blank"></a></div>
                    <div><a class="uk-icon-button" uk-icon="icon: instagram" href="#" target="_blank"></a></div>
                    <div><a class="uk-icon-button" uk-icon="icon: behance" href="#" target="_blank"></a></div>
                    <div><a class="uk-icon-button" uk-icon="icon: linkedin" href="#" target="_blank"></a></div>
                </div>
            </div>
        </div>
    </div>
</section>