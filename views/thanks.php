<?php


$datos = $_POST;


$name = $datos['name'];
$email = $datos['email'];
$phone = $datos['phone'];
$address = $datos['address'];
$number_home = $datos['number_home'];
$city = $datos['city'];
$perfil = $datos['perfil'];
$otro = $datos['otro'];
$interese = $datos['interese'];
$mensage = $datos['mensage'];
$perfil = $datos['perfil'];
$acept = isset($datos['acept']) ? "Sí" : "No";

// si perfil fuera otro, usamos el valor de otro en perfil.
$perfil_final = $perfil === 'otro' ? $otro : $perfil;

?>

    <section class="uk-container uk-margin-large-top uk-padding-small">
        <h2 class="uk-text-center uk-font-xlarge@s">¡Gracias por su Envío!</h2>
        <p class="uk-text-small@s uk-text-medium@m">
            Gracias <strong><?= $name ?></strong> por nos enviar su consentimiento para la curaduría de nuestra equipe. 
            En breve estaremos entrando en contacto por su email: <strong><?= $email ?></strong>, 
            y también enviaremos un mensaje a su número de celular: <strong><?= $phone ?></strong> 
            con los próximos pasos a seguir.
        </p>
        <div class="uk-text-center">
            <span class="uk-text-meta">Equipo <span class="uk-text-bold">Fundanción MALBA</span></span>
        </div>
    </section>

    <section class="uk-container uk-margin-large-top uk-margin-large-bottom">
        <div class="uk-flex uk-flex-column uk-flex-center uk-flex-middle">
            <button class="uk-button uk-button-default uk-width-1-1 uk-width-1-2@s" type="button" uk-toggle="target: #user-info">
                Ver Datos Completos
            </button>
        </div>

        <div id="user-info" hidden class="uk-margin-top">
            <h3 class="uk-heading-line uk-font-small@s"><span>Información Completa de <strong><?= $name ?></strong></span></h3>
            <div class="uk-overflow-auto">
                <table class="uk-table uk-table-divider uk-table-small uk-table-middle uk-table-responsive">
                    <tbody>
                        <tr><td><strong>Nombre Completo:</strong></td><td><?= $name ?></td></tr>
                        <tr><td><strong>Email:</strong></td><td><?= $email ?></td></tr>
                        <tr><td><strong>Teléfono:</strong></td><td><?= $phone ?></td></tr>
                        <tr><td><strong>Dirección:</strong></td><td><?= $address ?></td></tr>
                        <tr><td><strong>Altura:</strong></td><td><?= $number_home ?></td></tr>
                        <tr><td><strong>Ciudad/Provincia:</strong></td><td><?= $city ?></td></tr>
                        <tr><td><strong>Perfil:</strong></td><td><?= $perfil_final ?></td></tr>
                        <tr><td><strong>Obra de Interés:</strong></td><td><?= nl2br($interese) ?></td></tr>
                        <tr><td><strong>Motivo del Interés:</strong></td><td><?= nl2br($mensage) ?></td></tr>
                        <tr><td><strong>Consentimiento:</strong></td><td><?= $acept ?></td></tr>
                    </tbody>
                </table>
            </div>

        <div class="uk-text-center uk-margin-top uk-text-meta">
            <span>Equipo <span class="uk-text-bold">Fundanción MALBA</span></span>
        </div>
    </div>
            
        </div>
    </section>