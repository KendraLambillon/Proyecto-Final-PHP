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