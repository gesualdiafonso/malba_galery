

<section class="uk-container">
    <h2 class="form-title " uk-scrollspy="cls: uk-animation-slide-left; repeat: true">Envios a todo el pais</h2>
    <div uk-scrollspy="cls: uk-animation-slide-right; repeat: true">
        <h3 class="form-subtitle uk-text-center">Solicitación de Interes en las Obras mostrada en nuestra galería</h3>
    </div>
    <div class="uk-padding-medium uk-padding-remove-vertical">
        <p class="uk-text-large uk-margin-small-top" uk-scrollspy="cls: uk-animation-slide-left; repeat: true">En aras de la seguridad de nuestros autores y de sus derechos artísticos, le informamos de que la venta de sus obras está sujeta a una escala de usuarios.</p>
        <p class="uk-text-large uk-margin-small-top" uk-scrollspy="cls: uk-animation-slide-right; repeat: true">Le rogamos que rellene concienzudamente nuestro formulario y a continuación le indicaremos los pasos a seguir antes de su aprobación.</p>
        <span class="uk-text-default uk-margin-medium-top" uk-scrollspy="cls: uk-animation-slide-left; repeat: true">¡La creación de esta curadoría es de sumo necesario!</span>
    </div>
    <div class="uk-margin-medium-top uk-margin-large-bottom" uk-scrollspy="cls: uk-animation-slide-right; repeat: true">
        <form id="formulario" class="uk-form-stacked" action="index.php?section=thanks" method="POST">
            <!-- Dados Pessoais -->
            <div class="uk-grid-small" uk-grid>
                <div class="uk-width-1-1 uk-width-1-2@s">
                    <label class="uk-form-label" for="name">Nombre Completo <span class="">*</span></label>
                    <input class="uk-form-controls uk-input" type="text" id="name" name="name" >
                    <small class="error-message" id="nameError"></small>
                </div>
                <div class="uk-width-1-1 uk-width-1-2@s">
                    <label class="uk-form-label" for="email">Email <span class="">*</span></label>
                    <input class="uk-form-controls uk-input" type="email" id="email" name="email" >
                    <small class="error-message" id="emailError"></small>
                </div>
                <div class="uk-width-1-1 uk-width-1-2@s">
                    <label class="uk-form-label" for="phone">Teléfono para contacto<span class="">*</span></label>
                    <input class="uk-form-controls uk-input" type="tel" id="phone" name="phone" >
                    <small class="error-message" id="phoneError"></small>
                </div>
                <div class="uk-width-1-1 uk-width-1-2@s">
                    <label class="uk-form-label" for="address">Dirección de envío<span class="">*</span></label>
                    <input  class="uk-form-controls uk-input" type="text" id="address" name="address" >
                    <small class="error-message" id="addressError"></small>
                </div>
                <div class="uk-width-1-1 uk-width-1-2@s">
                    <label class="uk-form-label" for="number_home">Altura<span class="">*</span></label>
                    <input class="uk-form-controls uk-input" type="text" id="number_home" name="number_home" >
                    <small class="error-message" id="numberError"></small>
                </div>
                <div class="uk-width-1-1 uk-width-1-2@s">
                    <label class="uk-form-label" for="city">Ciudad/Provincia<span class="">*</span></label>
                    <input class="uk-form-controls uk-input" type="text" id="city" name="city" >
                    <small class="error-message" id="cityError"></small>
                </div>
            </div>
            <!-- Dados de perfil -->
            <div class="uk-grid-small uk-margin" uk-grid>
                <div class="uk-width-1-1 uk-width-1-2@s">
                    <label class="uk-form-label" for="perfil">Eres: </label>
                    <div class="uk-form-controls">
                        <select class="uk-select" id="perfil" name="perfil">
                            <option value="artista">Artista</option>
                            <option value="coleccionista">Coleccionista</option>
                            <option value="curador">Curador</option>
                            <option value="galerista">Galerista</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                    <div class="uk-margin-small-top">
                        <input class="uk-input" type="text" id="otro" name="otro" placeholder="Preencher el campo en caso de Otro">
                    </div>
                </div>
                <div class="uk-width-1-1 uk-width-1-2@s">
                    <label class="uk-form-label" for="interese">Obra de Interese</label>
                    <div class="uk-form-controls">
                        <textarea class="uk-textarea" name="interese" id="interese" rows="6" placeholder="Su relación con la obra, o artista...."></textarea>
                        <small class="error-message" id="mensageError"></small>
                    </div>
                </div>
                <div class="uk-width-1-1 uk-width-1-2@s">
                    <label for="mensage">Hable un poco sobre el motivo por el cual despertaste el interes en este artista y sus obras:</label>
                    <div class="uk-form-controls">
                        <textarea class="uk-textarea" name="mensage" id="mensage" rows="6" placeholder="Su relación con la obra, o artista...."></textarea>
                        <small class="error-message" id="mensageError"></small>
                    </div>

                </div>
                <div class="uk-width-1-1 uk-width-1-2@s">
                    <label>
                        <input class="uk-checkbox" type="checkbox" id="acept" name="acept" >
                        Confirmo que compreendo las solicitudes con relación a mi evaluación por parte de MALBA para una curadoria y que el envio no garante la adquisición de la obra.
                    </label>
                </div>
            </div>
            <div class="uk-width-1-1">
                    <button type="submit" class="uk-button uk-button-primary uk-width-1-1">Enviar Solicitud</button>
            </div>

        </form>
    </div>
</section>