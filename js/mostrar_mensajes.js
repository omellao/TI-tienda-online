async function getText() {
    const myObject = await fetch("../../src/read_mensajes.php", {
        method: "POST",
    });
    const obj = await myObject.json();

    document.getElementById("respuesta").innerHTML = "";
    // recorre los mensajes y los agrega al html
    for (let i = 0; i < obj.mensajes.length; i++) {
        let node = document.createElement("div");

        if (obj.mensajes[i].receptor == "Colchones") {
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

function activarChat() {
    semaforo = setInterval(verChat, 1000);
}
function verChat() {
    getText();
}
function desactivarChat() {
    clearInterval(semaforo);
}
