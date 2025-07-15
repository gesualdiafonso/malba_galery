<?php
require_once '../includes/utilities/controllers/autoloader.php';

$userData = $_SESSION['logged_in'] ?? false;

$section = $_GET['section'] ?? 'dashboard';
$isLoginSection = $section === 'login';

if ($userData && !in_array($userData['role'], ['admin', 'superadmin'])) {
    Flags::add_flags('danger', "Acceso denegado. Usted no pose los permisos administrativos!");
    header('Location: ../index.php?section=login');
    exit;
}

$views = View::validate_views($section);

Autentication::verify($views->getRestringida());

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Meta Control SEO -->
    <meta name="description" content="<?= $views->getDescription(); ?>">

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.23.6/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.23.6/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.23.6/dist/js/uikit-icons.min.js"></script>

    <!-- Links Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Links css global -->
    <link rel="stylesheet" href="../public/style/main.css">

    <link rel="shortcut icon" href="../public/images/ICONO.svg" type="image/x-icon">

    <title><?= $views->getTitle(); ?></title>
</head>

<body>
    <?php if ($userData){ ?>
        <div class="uk-flex uk-height-viewport">
            
                <!-- MENU LATERAL (Desktop) -->
            <aside id="desktop-menu" class="uk-visible@l uk-background-muted uk-padding-small uk-flex uk-flex-column" style="width: 250px;">
                <div class="uk-flex uk-flex-middle uk-flex-column uk-margin-bottom">
                    <img src="../public/images/logo_malba.png" alt="Logo Malba" style="max-height: 50px;">
                    <h1 class="team">Team Admin</h1>
                    <h2><?= $userData['name'] ?></h2>
                </div>
                <ul class="uk-nav uk-nav-default uk-text-default">
                    <li><a href="index.php?section=dashboard">Dashboard</a></li>
                    <li><a href="index.php?section=admin_artista">Artistas</a></li>
                    <li><a href="index.php?section=admin_obras">Obras</a></li>
                    <li><a href="index.php?section=admin_categoria">Categoria</a></li>
                    <li><a href="index.php?section=admin_tecnica">Tecnica</a></li>
                    <li>
                        <div class="uk-inline">
                            <button class="uk-button uk-button-small uk-button-default uk-text-warning uk-text-center" type="button">Crear Tablas</button>
                            <div uk-dropdown="animation: slide-top; animate-out: true; duration: 700">
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li class="uk-nav-header uk-text-center">Crear:</li>
                                    <li><a class="uk-text-warning uk-text-center" href="index.php?section=add_artista">Artista</a></li>
                                    <li class="uk-nav-divider"></li>
                                    <li><a class="uk-text-warning uk-text-center" href="index.php?section=add_obras">Obra</a></li>
                                    <li class="uk-nav-divider"></li>
                                    <li><a class="uk-text-warning uk-text-center" href="index.php?section=add_categoria">Categoria</a></li>
                                    <li class="uk-nav-divider"></li>
                                    <li><a class="uk-text-warning uk-text-center" href="index.php?section=add_tecnica">Tecnica</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
                <!-- BOTÃO DE LOGOUT (ICONE) -->
                <a href="action/auth_logout.php" class="uk-icon-button uk-margin-top" uk-icon="icon: sign-out" uk-tooltip="title: Logout"></a>
                <!-- Botão para esconder menu -->
                <button class="uk-button uk-button-default uk-margin-top" id="collapse-menu-btn">
                    Colapsar
                </button>
            </aside>

            <!-- MENU COLAPSADO -->
            <aside id="collapsed-menu" class="uk-hidden uk-visible@l uk-background-muted uk-padding-small uk-flex uk-flex-column uk-flex-middle" style="width: 200px;">
                <img src="../public/images/logo_malba.png" alt="Logo Malba" style="max-height: 50px;">
                <h2>Team MALBA</h2>
                <h3><?= $userData['name'] ?></h3>
                <button class="uk-button uk-button-default uk-margin-top" id="expand-menu-btn" uk-tooltip="title: Expandir Menu">
                    Abrir Menu
                </button>
            </aside>

            <!-- CONTEÚDO PRINCIPAL -->
            <div class="uk-width-expand uk-flex uk-flex-column">
                <!-- NAVBAR (HEADER FIXO MOBILE) -->
                <nav class="uk-navbar-container uk-navbar-transparent uk-padding-small uk-hidden@l uk-flex uk-flex-middle" uk-navbar>
                    <div class="uk-navbar">
                        <a class="uk-navbar-toggle" uk-toggle="target: #mobile-menu">
                            <span class="uk-button uk-button-default uk-button-small uk-text-default" uk-navbar-toggle>Abrir menu</span>
                        </a>
                    </div>
                    <div class="uk-navbar uk-padding">
                        <div class="uk-flex uk-flex-row">
                            <div><img src="../public/images/logo_malba.png" alt="Logo Malba" style="max-height: 40px;"></div>
                            <div><h2 class="team">Team Admin</h2></div>
                            <div><h3><?= $userData['name'] ?></h3></div>
                        </div>
                    </div>
                </nav>

                <!-- MOBILE OFFCANVAS -->
                <div id="mobile-menu" uk-offcanvas="overlay: true">
                    <div class="uk-offcanvas-bar uk-flex uk-flex-column">
                        <button class="uk-offcanvas-close" type="button" uk-close></button>
                        <div class="uk-flex uk-flex-column uk-flex-middle uk-margin-bottom">
                            <img src="../public/images/logo_malba.png" alt="Logo Malba" style="max-height: 50px;">
                            <h2 class="team">Team Admin</h2>
                            <h3><?= $userData['name'] ?></h3>
                        </div>
                        <ul class="uk-nav uk-nav-default">
                            <li><a href="index.php?section=dashboard">Dashboard</a></li>
                            <li><a href="index.php?section=admin_artista">Artistas</a></li>
                            <li><a href="index.php?section=admin_obras">Obras</a></li>
                            <li><a href="index.php?section=admin_categoria">Categoria</a></li>
                            <li><a href="index.php?section=admin_tecnica">Tecnica</a></li>
                            <li class="uk-button uk-button-small uk-button-default"><a class="uk-text-warning uk-text-center" href="index.php?section=add_artista">Crear Artistas</a></li>
                            <li class="uk-button uk-button-small uk-button-default"><a class="uk-text-warning uk-text-center" href="index.php?section=add_obras">Crear Obras</a></li>
                            <li class="uk-button uk-button-small uk-button-default"><a class="uk-text-warning uk-text-center" href="index.php?section=add_categoria">Crear Categoria</a></li>
                            <li class="uk-button uk-button-small uk-button-default"><a class="uk-text-warning uk-text-center" href="index.php?section=add_tecnica">Crear Tecnica</a></li>
                        </ul>
                        <!-- Logout Mobile -->
                        <a href="action/auth_logout.php" class="uk-icon-button uk-margin-small-top" uk-icon="sign-out" uk-tooltip="title: Logout"></a>
                    </div>
                </div>
                <!-- MAIN CONTENT -->
                <main class="uk-container uk-margin-top uk-animation-slide-right-medium">
                    <?php require_once("views/{$views->getName()}.php"); ?>
                </main>
            </div>
        <?php } else {?>
            <?php require_once("views/{$views->getName()}.php"); ?>
        <?php } ?>
    </div>

    <script>
        const desktopMenu = document.getElementById('desktop-menu');
        const collapsedMenu = document.getElementById('collapsed-menu');
        const collapseBtn = document.getElementById('collapse-menu-btn');
        const expandBtn = document.getElementById('expand-menu-btn');

        collapseBtn.addEventListener('click', () => {
            desktopMenu.classList.add('uk-hidden');
            collapsedMenu.classList.remove('uk-hidden');
        });

        expandBtn.addEventListener('click', () => {
            collapsedMenu.classList.add('uk-hidden');
            desktopMenu.classList.remove('uk-hidden');
        });
    </script>
</body>

</html>