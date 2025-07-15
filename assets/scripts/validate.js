document.getElementById("formulario").addEventListener("submit", function(e){
    const form = e.target;
    const acept = document.getElementById("acept");
    const name = document.getElementById('name');
    const email = document.getElementById('email');
    const phone = document.getElementById('phone');
    const address = document.getElementById('address');
    const numberHome = document.getElementById('number_home');
    const city = document.getElementById('city');
    const perfil = document.getElementById('perfil');
    const interese = document.getElementById('interese')
    const mensage = document.getElementById('mensage');

    // Doy variable para isValidate
    let isValidate = true;

    // Impido el usuaro de eviar 
    e.preventDefault()

    document.querySelectorAll('.error-message').forEach(e => (e.textContent = ''));

    // Valido los campos obligatorios
    if(name.value.trim() === ''){
        isValidate = false;
        document.getElementById('nameErro').textContent = 'Por favor, insira su nombre'
    }

    if(!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)){
        isValidate = false;
        document.getElementById('emailError').textContent = 'Email invalido. Volver a preenchelo!';
    }

    if(!/^\+?\d{7,15}$/.test(phone.value)){
        isValidate = false;
        document.getElementById('phoneError').textContent = 'Telefono invalido, volver a cargarlo!'; 
    }

    if(address.value.trim() === ''){
        isValidate = false;
        document.getElementById('addressError').textContent = 'La dirección de envio es obligatoria'
    }

    if(numberHome.value.trim() === ''){
        isValidate = false;
        document.getElementById('numberError').textContent = 'La dirección de envio es obligatoria'
    }

    if(city.value.trim() === ''){
        isValidate = false;
        document.getElementById('cityError').textContent = 'Ciudad o Provincia es obligatório'
    }
    if(mensage.value.trim() === '' && interese.value.trim() === ''){
        isValidate = false;
        document.getElementById('mensageError').textContent = 'Este campo es obligatorio!'
    }

    // Hago una verificación del consentimiento
    if(!acept.checked){
        UIkit.notification({
            message: 'Hay que preencher el campo de termo de condiciones!',
            status: 'danger',
            pos: 'top-center',
            timeout: 4000
        });
        return
    }

    if(isValidate){
        form.submit();
    }
})