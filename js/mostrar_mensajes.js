var n = 0;

async function getText(file) {
    let myObject = await fetch(file);
    let myText = await myObject.text();
    let obj = await JSON.parse(myText);
    // console.log(obj.mensajes);

    if (n == 0) {
        // recorre todos los mensajes y los agrega al html
        for (let i = 1; i < obj.mensajes.length; i++) {
            let node = document.createElement("div");

            if (obj.mensajes[i].user == "usuario1") {
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

        // cambiar parametro
        n = 1;
    } else {
        document.getElementById("respuesta").innerHTML = "";
        // recorre todos los mensajes y los agrega al html
        for (let i = 1; i < obj.mensajes.length; i++) {
            let node = document.createElement("div");

            if (obj.mensajes[i].user == "usuario1") {
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
}

function activarChat() {
    semaforo = setInterval(verChat, 1000);
}
function verChat() {
    getText("./php/leerColeccion.php");
}
function desactivarChat() {
    clearInterval(semaforo);
}