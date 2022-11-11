var arrays = [];
var nume = 0;

document.getElementById("boton-contacto").addEventListener("click", getContact);
document.getElementById("boton-contacto").addEventListener("click", verific);

// READ TO CHATS
async function getContact() {
    const myObject = await fetch("../../src/leer_contactos.php", {
        method: "POST",
    });
    // console.log(myObject);
    const obj = await myObject.json();
    // console.log(obj.users);
    arrays = obj.users;
    // console.log(arrays);

    document.getElementById("contac").innerHTML = "";

    var contador = 0;
    // recorre los mensajes y los agrega al htmlSS
    for (let i = 0; i < obj.users.length; i++) {
        let node = document.createElement("li");
        // node.className += "un-contacto";

        node.innerHTML =
            "<div class='un-contacto'><img src=" +
            "'../img/usuario.png'" +
            "><p>" +
            obj.users[i].user +
            "</p><button onclick='cambiarNum(" +
            contador +
            ")'>Crear</button></div>";

        contador += 1;

        // console.log(node);
        document.getElementById("contac").appendChild(node);
        // console.log(obj.mensajes[i].user);
    }
    return arrays;
}

// LLAMAR FUN CON ONECLICK
function cambiarNum(nummm) {
    // num = nummm;
    enviarFormulario(nummm);
    // console.log(arrays[num].user);
}

// VERIFICADOR
var arrayChats = [];
async function verific() {
    const myObject2 = await fetch("../../src/read_receptores.php", {
        method: "POST",
    });
    const obj2 = await myObject2.json();

    var arrayLoca = [];
    for (let i = 0; i < obj2.contac.length; i++) {
        arrayLoca.push(obj2.contac[i].users[1]);
    }

    arrayChats = arrayLoca;
    // console.log(arrayChats);
    return arrayChats;
}

// CREAMOS UN CHAT
async function enviarFormulario(num) {
    const formulario = document.getElementById("formulario");

    var numVerific = 1;
    for (let i = 0; i < arrayChats.length; i++) {
        if (arrays[num].user == arrayChats[i]) {
            alert("ESTE CONTACTO YA EXISTE");
            numVerific = 0;
        }
    }

    if (numVerific == 1) {
        let datosFormulario = new FormData(formulario);

        // FETCH
        datosFormulario.append("user1", arrays[num].user);
        let response = await fetch("../../src/crear_chat.php", {
            method: "POST",
            body: datosFormulario,
        });

        let respuesta = await response.text();
        let obj = JSON.parse(respuesta);
        console.log("SE CREO CORRECTAMENTE");
        verific();
    }
}

document
    .getElementById("boton-contacto")
    .addEventListener("click", contactNone);

// ESCONDER BARRA LATERAL
var numNone = 0;
function contactNone() {
    if (numNone == 0) {
        document.getElementById("contac").style.display = "block";
        numNone = 1;
    } else {
        document.getElementById("contac").style.display = "none";
        numNone = 0;
    }
}
