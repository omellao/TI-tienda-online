document.getElementById("btn__registrarse").addEventListener("click", register);
document.getElementById("btn__iniciar-sesion").addEventListener("click", login);
window.addEventListener("resize", anchoPag);

var form_login = document.querySelector(".formulario__login");
var form_register = document.querySelector(".formulario__register");
var contenedor_login_register = document.querySelector(".contenedor__login-register");
var caja_trasera_login = document.querySelector(".caja__trasera-login");
var caja_trasera_register = document.querySelector(".caja__trasera-register");


function anchoPag() {
    if (window.innerWidth > 850) {
        caja_trasera_login.style.display = "block";
        caja_trasera_register.style.display = "block";
    } else {
        caja_trasera_register.style.display = "block";
        caja_trasera_register.style.opacity = "1";
        caja_trasera_login.style.display = "none";
        form_login.style.display = "block";
        form_register.style.display = "none";
        contenedor_login_register.style.left = "0px";
    }
}

anchoPag();

function register() {
    if (window.innerWidth > 850) {
        form_register.style.display = "block";
        contenedor_login_register.style.left = "410px"
        form_login.style.display = "none";
        caja_trasera_register.style.opacity = "0";
        caja_trasera_login.style.opacity = "1";
    } else {
        form_register.style.display = "block";
        contenedor_login_register.style.left = "0px";
        form_login.style.display = "none";
        caja_trasera_register.style.display = "none";
        caja_trasera_login.style.display = "block";
        caja_trasera_login.style.opacity = "1";
    }

}

function login() {
    if (window.innerWidth > 850) {
        form_register.style.display = "none";
        contenedor_login_register.style.left = "10px"
        form_login.style.display = "block";
        caja_trasera_register.style.opacity = "1";
        caja_trasera_login.style.opacity = "0";
    } else {
        form_register.style.display = "none";
        contenedor_login_register.style.left = "0px"
        form_login.style.display = "block";
        caja_trasera_register.style.display = "block";
        caja_trasera_login.style.display = "none";
    }
}
