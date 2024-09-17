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
    let regex = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{10,60}$/;
    return regex.test(email);
}

function validateTelefono(phone){
    let regex = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{9,20}$/;
    return regex.test(phone);
}

function validateFnac(fnac){
    let regex = /(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)/;
    return regex.test(fnac);
}

function validateAddress(address){
    let regex = /^(\d{1,}) [a-zA-Z0-9\s]+(\,)? [a-zA-Z]+(\,)? [A-Z]{2} [0-9]{5,6}$/;
    return regex.test(address);
}

function validateSexo(gender){
    let regex = /^[a-zA-Z ]{4,6}$/;
    return regex.test(gender);
}

function validateNameUser(user_ref){
    let regex = /^[A-Za-z][A-Za-z0-9_]{4,45}$/;
    return regex.test(user_ref);
}

function validatePwd(userpwd){
    let regex = /^(?=.*[A-Z])(?=.*\d)(?=.*[.,_\-])[a-zA-Z\d.,_\-]{8,20}$/;
    return regex.test(userpwd);
}

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







