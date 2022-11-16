let arrays = [];
let nume = 0;

// READ TO CHATS
async function getContact() {
    const myObject = await fetch("../../src/leer_contactos.php", {
        method: "POST",
    });
    // console.log(myObject);
    const data = await myObject.json();
    arrays = data.users;

    document.getElementById("contac").innerHTML = "";

    var contador = 0;
    // recorre los mensajes y los agrega al htmlSS
    for (let i = 0; i < data.users.length; i++) {
        let node = document.createElement("li");
        // node.className += "un-contacto";

        node.innerHTML =
            `<div class='un-contacto'>
                <img src="../img/usuario.png">
                <p>${data.users[i].username}</p>
                <button onclick='cambiarNum(${contador})'>
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAAWJJREFUSEvtVtFNw0AUsyeADYAJYAPoBMAGjAATUCYANugGlAloJyhMQNkAJjAyukRRkktzSUTy0SdFlZrX59jn55QYqTgSLvbA/6b8dKWWdAvgKEixJfk8hCxRxpKOAbwAOCsBvQO4Jrnt8wBNwCsA55HhK5KzwYElmeVmx+CTPqxrGUu6APC2A3hG0qpUSlKm1pqkZ1VqWsB+PEnfAA4irH9IHsYU6cw4AF8FV9fNt6uX2Y2wAdnK+eunsA3eAK9jVl+ZLxoDJJz1vODuNYB5+Wwluee+hcsfSLp3mJfEoMCSLPUlAAdJsRwcS5KvJamLfZb6FMBHSWon31/wVKRuSKyyktEESzaXJDv1E0DUsSV0O99B4s+8ugA3xWTMO5X4TAIOEpttl0qOz/yMw+vvsQsqgDuSNlTrKgK33cW64fl+tkUuAt8A8NWlFiQXKT+c7l+fFBYpvXvGKWr16h1N6l/7LJAfjlOuXQAAAABJRU5ErkJggg=="/>
                </button>
            </div>
            `;

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
let arrayChats = [];
async function verific() {
    const myObject2 = await fetch("../../src/read_receptores.php", {
        method: "POST",
    });

    const obj2 = await myObject2.json();

    if (!obj2.chats) return;

    let arrayLoca = [];
    for (let i = 0; i < obj2.chats.length; i++)
        arrayLoca.push(obj2.chats[i].users[1]);

    arrayChats = arrayLoca;
    return arrayChats;
}

// CREAMOS UN CHAT
async function enviarFormulario(num) {
    const formulario = document.getElementById("formulario");

    var numVerific = 1;
    for (let i = 0; i < arrayChats.length; i++) {
        if (arrays[num].username == arrayChats[i]) {
            alert("ESTE CONTACTO YA EXISTE");
            numVerific = 0;
        }
    }

    if (numVerific != 1) return;

    let datosFormulario = new FormData(formulario);

    // FETCH
    datosFormulario.append("user", arrays[num].username);

    let response = await fetch("../../src/crear_chat.php", {
        method: "POST",
        body: datosFormulario,
    });

    let obj = await response.json();

    console.log("SE CREO CORRECTAMENTE");
    verific();
}

// ESCONDER BARRA LATERAL
var numNone = 0;

function contactNone() {
    if (numNone == 0) {
        document.getElementById("contac").style.display = "block";

        document.getElementById("contac2").style.display = "block";
        numNone = 1;
    } else {
        document.getElementById("contac").style.display = "none";

        document.getElementById("contac2").style.display = "none";
        numNone = 0;
    }
}

const contact = () => {
    getContact();
    verific();
    contactNone();
}

document.getElementById("boton-contacto").addEventListener("click", contact);

