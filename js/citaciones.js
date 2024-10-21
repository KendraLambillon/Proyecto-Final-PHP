//Validacion del formulario
//Selecionamos las variables y los inputs del formulario
const registro_form = document.querySelector('.mi__form');
const email = document.querySelector('#email');
const fecha_cita = document.querySelector('#fecha_cita');
const motivo_cita = document.querySelector('#motivo_cita');


//Definimos las funciones para realizar la validacion de los inputs
function validateEmail(email){
    let regex = /^[\w-]*@([\w-]+\.)+[a-zA-Z]{2,3}$/;
    return regex.test(email);
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


document.addEventListener("DOMContentLoaded", function() {
    //Función para validar si la fecha es valida
    function fechaValidate(fecha) {
        return fecha instanceof Date && !isNaN(fecha);
    }

    //Validamos la fecha de la cita
    function validarFechaCita() {
        let fechaInput = document.getElementById("fecha_cita");
        //Dividimos la entrada para evitar conversiones de zona horaria
        let formattedFecha = fechaInput.value.split('/');
        //Creamos la fecha en UTC
        let fechaSeleccionada = new Date(Date.UTC(formattedFecha[0], formattedFecha[1] - 1, formattedFecha[2]));
        let mensajeError = document.querySelector(".input_error");

        if(!fechaValidate(fechaSeleccionada)) {
            mensajeError.textContent = "Porfavor, introduce una fecha válida.";
            fechaInput.value = "";
        }

        //Usamos getUTCDay para obtener el dia en UTC
        let diaSemana = fechaSeleccionada.getUTCDay();

        /*
            0: Domingo
            1: Lunes
            2: Martes
            3: Miércoles
            4: Jueves
            5: Viernes
            6: Sábado
        */

        //Definimos los dias que deseamos habilitar
        if(diaSemana !== 1 && diaSemana !== 2 && diaSemana !== 3 && diaSemana !== 4 && diaSemana !== 5) {
            fechaInput.value = ""; //Borrar la fecha seleccioanda
            mensajeError.textContent = "Este día no se cuenta con servicio, selecciona uno distinto.";
        } else {
            mensajeError.textContent = "";
        }
    }

    //Agregamos un evento onchange al campo de fecha
    document.getElementById("fecha").addEventListener("change", validarFechaCita);

});
