// Seleccionamos las variables y los inputs del formulario
const register_form = document.querySelector('.mi__form');
const user_usuario = document.querySelector('#user_ref');
const user_pwd = document.querySelector('#userpwd');

function validateUsuario(user_ref){
    let regex = /^[a-zA-Z ]{2,45}$/;

    return regex.test(user_ref);
}

function validatePassword(userpwd){
    let regex = /^(?=.*[A-Z])(?=.*\d)(?=.*[.,_\-])[a-zA-Z\d.,_\-]{8,20}$/;

    return regex.test(userpwd);
}

// Definimos las funciones de validación que se ejecutarán al salir del input
function validateOnBlur(inputElement, validator){
    inputElement.addEventListener('blur', function(){
        let value = inputElement.value;
        let valid = validator(value);
        let smallElement = inputElement.nextElementSibling; // Encuentra el elemento small

        if(!valid){
            smallElement.textContent = "Error: El contenido introducido no es válido";
            smallElement.style.color = "red";
            smallElement.style.visibility = "visible";
        }else{
            smallElement.style.visibility = "hidden"; // Escondemos el campo
            smallElement.textContent = ''; // Liampiamos el campo
        }

    });
}

// Capturamos el evento del envío del formulario para controlar si hay errores.
register_form.addEventListener('submit', function(e){
    let isUsuarioValid = validateUsuario(user_usuario.value);
    let isPasswordValid = validatePassword(user_pwd.value);

    if (!isUsuarioValid || !isPasswordValid){
        // Prevenimos el envío del formulario
        e.preventDefault();
    }
})

// Ejecutamos las funciones de validación
validateOnBlur(user_usuario, validateUsuario);
validateOnBlur(user_pwd, validatePassword);