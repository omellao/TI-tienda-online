// este recibe todo el contenido con ajax

var xhr = new XMLHttpRequest();

xhr.open("GET", "leerColeccion.php");
xhr.onload = function () {
    if (xhr.status == 200) {
        var json = JSON.parse(xhr.responseText);
        // console.log(json.mensajes[2].user);
        console.log(json.mensajes[8].mensaje);
        document.getElementById("respuesta").innerHTML =
            json.mensajes[0].mensaje;
    } else {
        console.log("ERROR: " + xhr.status);
    }
};
xhr.send();
