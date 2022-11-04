async function getText(file) {
    const myObject = await fetch(file, {
        method: "POST",
    });
    console.log(myObject);

    const obj = await myObject.json();
    console.log(obj);

    // // recorre todos los mensajes y los agrega al html
    // for (let i = 1; i < obj.mensajes.length; i++) {
    //     let node = document.createElement("div");

    //     if (obj.mensajes[i].user == "usuario1") {
    //         node.className += "mensaje-user-1 mensaje";
    //         let textnode = document.createTextNode(obj.mensajes[i].mensaje);
    //         node.appendChild(textnode);
    //     } else {
    //         node.className += "mensaje-user-2 mensaje";
    //         let textnode = document.createTextNode(obj.mensajes[i].mensaje);
    //         node.appendChild(textnode);
    //     }

    //     document.getElementById("respuesta").appendChild(node);
    //     // console.log(obj.mensajes[i].user);
    // }
}

// function activarChat() {
//     semaforo = setInterval(verChat, 1000);
// }
function verChat() {
    getText("../../src/leerColeccion.php");
}
// function desactivarChat() {
//     clearInterval(semaforo);
// }
