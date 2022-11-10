const email = document.getElementById("email");
const nombre = document.getElementById("name");
const pass = document.getElementById("passwd");
const form = document.getElementById("form-signup");
const parrafo = document.getElementById("warnings");

form.addEventListener("submit", e=>{
    e.preventDefault()
    let warnings = ""
    let entrar = false
    let emailTest = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/
    parrafo.innerHTML = ""
    if(nombre.value.length <6){
        warnings += 'El nombre no es valido <br>'
        entrar = true
    }
    if(!emailTest.test(email.value)){
        warnings += 'El email no es valido <br>'
        entrar = true
    }
    if(pass.value.length < 8){
        warnings += 'La contraseña no es valida <br>'
        entrar = true
    }

    if(entrar){
        parrafo.innerHTML = warnings
    }else{
        window.location.replace("registro.html");
        window.alert("El usuario ingresado se ha registrado correctamente!");
    }
})