//Show-Hide password
const check_password = document.getElementById("checkpwd");
const password_input = document.getElementById("userpwd");

check_password.addEventListener('click', function(){
    showHide_password(password_input);
});

function showHide_password(pwd_input){
    if(pwd_input.type === "password"){
        pwd_input.type = "text";
    } else {
        pwd_input.type = "password";
    }
}

//Validacion del formulario
//Selecionamos las variables y los inputs del formulario
const registro_form = document.querySelector('.mi__form');
const nombre = document.querySelector('#username');
const apellidos = document.querySelector('#surname');
const email = document.querySelector('#email');
const telefono = document.querySelector('#phone');
const fecha_nacimiento = document.querySelector('#fnac');
const direccion = document.querySelector('#address');
const sexo = document.querySelector('#gender');
const nombre_usuario = document.querySelector('#user_ref');
const contrasena = document.querySelector('#userpwd');


//Definimos las funciones para realizar la validacion de los inputs
function validateName(username){
    let regex = /^[a-zA-Z ]{2,45}$/;
    return regex.test(username);
}

function validateSurname(surname){
    let regex = /^[a-zA-Z ]{2,45}$/;
    return regex.test(surname);
}

function validateEmail(email){
    let regex = /^[\w-]*@([\w-]+\.)+[a-zA-Z]{2,3}$/;
    return regex.test(email);
}

function validateTelefono(phone){
    let regex = /^\d{9}$/;
    return regex.test(phone);
}

///^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/(19|20)\d{2}$/

function validateFnac(fnac){
    let regex = /^(0[1-9]|[12][0-9]|3[01])[-\/](0[1-9]|1[0-2])[-\/](19|20)\d{2}$/;
    return regex.test(fnac);
}
// /^(0[1-9]|[12][0-9]|3[01])[-\/](0[1-9]|1[0-2])[-\/](19|20)\d{2}$/

function validateAddress(address){
    let regex = /^[a-zA-Z0-9\s,.#-]{5,100}$/;
    return regex.test(address);
}

function validateSexo(gender){
    let regex = /^(Mujer|Hombre|Neutro)$/;
    return regex.test(gender);
}

function validateNameUser(user_ref){
    let regex = /^[A-Za-z][A-Za-z0-9_]{4,45}$/;
    return regex.test(user_ref);
}

function validatePwd(userpwd){
    let regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[-_.])[a-zA-Z0-9._-]{4,20}$/;
    return regex.test(userpwd);
}
// /^[a-zA-Z0-9._-!*]{6,20}$/
// ^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[-_.])[a-zA-Z0-9._-]{4,20}$

//Definimos las funciones de validación al salir del input
function validateOnBlur(inputElement, validator){
    inputElement.addEventListener('blur', function(){
        let value = inputElement.value;
        let valid = validator(value);
        let smallElement = inputElement.nextElementSibling; //encuentra el elemento small

        if(!valid){
            smallElement.textContent = "Error: El contenido introducido no es valido";
            smallElement.style.color = "red";
            smallElement.style.visibility = "visible";
        }else{
            smallElement.style.visibility = "hidden"; //esconde el campo
            smallElement.textContent = ""; //Limpia el campo
        }
    });
}

//Capturamos el evento del envio formulario para controlar errores
registro_form.addEventListener('submit', function(e){
    let nombreValid = validateName(username.value);
    let apellidosValid = validateSurname(surname.value);
    let emailValid = validateEmail(email.value);
    let telefonoValid = validateTelefono(phone.value);
    let fnacValid = validateFnac(fnac.value);
    let addressValid = validateAddress(address.value);
    let sexoValid = validateSexo(gender.value);
    let nombreUsuarioValid = validateNameUser(user_ref.value);
    let pwdValid = validatePwd(userpwd.value);

    if(!nombreValid || !apellidosValid || !emailValid || !telefonoValid || !fnacValid || !addressValid || !sexoValid || !nombreUsuarioValid || !pwdValid){
        //prevenimos el envio del form
        e.preventDefault;
    }
})

//Ejecutamos las funciones de validación
validateOnBlur(nombre, validateName);
validateOnBlur(apellidos, validateSurname);
validateOnBlur(email, validateEmail);
validateOnBlur(telefono, validateTelefono);
validateOnBlur(fecha_nacimiento, validateFnac);
validateOnBlur(direccion, validateAddress);
validateOnBlur(sexo, validateSexo);
validateOnBlur(nombre_usuario, validateNameUser);
validateOnBlur(contrasena, validatePwd);
