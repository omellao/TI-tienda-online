// VARIABLES
let id_chat = "";
// VARIABLE SESION
let user = "Colchones";

// CAMBIO DE VARIABLE
function cambio(x) {
    id_chat = x;
    console.log(id_chat);
    // DE PASO ACTIVA LOS CHAT
    activarChat();
    // activarChat(id_chat);
    function activarChat() {
        semaforo = setInterval(verChat, 1000);
    }
    function verChat() {
        form(id_chat);
    }
    function desactivarChat() {
        clearInterval(semaforo);
    }
}

document
    .getElementById("formulario2")
    .addEventListener("submit", function (event) {
        event.preventDefault();
        form_mensajes(id_chat);
    });

// CREAMOS UN MENSAJE
async function form_mensajes(id) {
    const formulario = document.getElementById("formulario2");

    let datosFormulario = new FormData(formulario);
    datosFormulario.append("emisor", user);
    datosFormulario.append("id_chat", id);
    // FETCH
    let response = await fetch("../../src/agregar_mensajes.php", {
        method: "POST",
        body: datosFormulario,
    });
}

// LEER MENSAJES
async function form(id) {
    const formulario3 = document.getElementById("formulario3");

    let datosFormulario3 = new FormData(formulario3);
    datosFormulario3.append("id_chat2", id);
    // FETCH
    let response = await fetch("../../src/read_mensajes.php", {
        method: "POST",
        body: datosFormulario3,
    });

    // const respuesta = await response.text();
    const obj = await response.json();
    console.log(obj);

    document.getElementById("respuesta").innerHTML = "";
    // recorre los mensajes y los agrega al html
    for (let i = 0; i < obj.mensajes.length; i++) {
        let node = document.createElement("div");

        if (obj.mensajes[i].emisor == user) {
            node.className += "mensaje-user-1 mensaje";
            let textnode = document.createTextNode(obj.mensajes[i].mensaje);
            node.appendChild(textnode);
        } else {
            node.className += "mensaje-user-2 mensaje";
            let textnode = document.createTextNode(obj.mensajes[i].mensaje);
            node.appendChild(textnode);
        }

        document.getElementById("respuesta").appendChild(node);
        // console.log(obj.mensajes[i].user);
    }
}
