<div class="uk-background-image uk-background-cover uk-background-muted uk-height-medium uk-width-1-1 uk-flex uk-flex-center uk-flex-middle" style="width: 100vw; height: 100vh;background-image: url(./public/images/museo_latam.jpg);">
    <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-padding-large">
        <div style="opacity: 1!important;">
            <h2 class="uk-card-title uk-text-center">Iniciar Sessión</h2>
            <div>
                <?= Flags::get_flags() ?>
            </div>
            <h3 class="uk-text-center">Usuarios MALBA</h3>
            <form action="admin/action/auth_login.php" class="uk-flex uk-grid-small uk-flex-column uk-flex-middle" uk-grid method="POST">
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
                
                <div class="uk-width-1-1">
                    <button type="submit" class="uk-button uk-button-default">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>