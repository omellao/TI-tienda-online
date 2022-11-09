// este recibe todo el contenido con ajax

var xhr = new XMLHttpRequest();

xhr.open("GET", "./php/leerColeccion.php");
xhr.onload = function () {
    if (xhr.status == 200) {
        var json = JSON.parse(xhr.responseText);
        // console.log(json.mensajes[2].user);
        // console.log(json.mensajes.length);

        // recorre todos los mensajes y los agrega al html
        for (let i = 1; i < json.mensajes.length; i++) {
            let node = document.createElement("div");

            if (json.mensajes[i].user == "usuario1") {
                node.className += "mensaje-user-1 mensaje";
                let textnode = document.createTextNode(
                    json.mensajes[i].mensaje
                );
                node.appendChild(textnode);
            } else {
                node.className += "mensaje-user-2 mensaje";
                let textnode = document.createTextNode(
                    json.mensajes[i].mensaje
                );
                node.appendChild(textnode);
            }

            document.getElementById("respuesta").appendChild(node);
            // console.log(json.mensajes[i].user);
        }
    } else {
        console.log("ERROR: " + xhr.status);
    }
};
xhr.send();