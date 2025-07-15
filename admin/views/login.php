<div class="uk-background-image uk-background-cover uk-background-muted uk-height-medium uk-width-1-1 uk-flex uk-flex-center uk-flex-middle" style="width: 100vw; height: 100vh;background-image: url(../public/images/museo_latam.jpg);">
    <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-padding-large uk-overlay uk-overlay-default">
        <div style="opacity: 1!important;">
            <h1 class="uk-card-title uk-text-center">Iniciar Sessión</h1>
            <h2>Usuarios Administrativos</h2>

            <div>
                <?= Flags::get_flags() ?>
            </div>
            <form action="action/auth_login.php" class="uk-flex uk-grid-small uk-flex-column uk-flex-middle" uk-grid method="POST">
                <div class="uk-width-expand uk-margin">
                    <label for="user_name">Nombre de Usuario</label>
                    <div class="uk-width-expand uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: user"></span>
                        <input class="uk-input" type="text" id="user_name" name="user_name" aria-label="Not clickable icon">
                    </div>
                </div>
                <div class="uk-width-expand uk-margin">
                    <label for="password">Password</label>
                    <div class="uk-width-expand uk-inline">
                        <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
                        <input class="uk-input" type="password" id="password" name="password" aria-label="Not clickable icon">
                    </div>
                </div>
                
                <div class="uk-width-expand">
                    <button type="submit" class="uk-button uk-button-default uk-text-secondary">Login</button>
                </div>
            </form>
            <div>
                <a class="uk-button uk-button-secondary" href="../index.php?section=home">Volver al Home Page</a>
            </div>
        </div>
    </div>
    <div class="uk-position-top-right uk-overlay">
        <img src="./../public/images/logoMalba_completo.png" alt="Logo Malba Museo Latino Americano" style="width: 250px;">
    </div>
</div>