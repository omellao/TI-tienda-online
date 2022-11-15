// document
//     .getElementById("crear-contacto")
//     .addEventListener("click", desactivarReceptores);

// VARIABLE SESION
let user_s = "Colchones";

async function getReceptores() {
    const myObject = await fetch("../../src/read_receptores.php", {
        method: "POST",
    });
    const obj = await myObject.json();
    // console.log(obj.chats[0]._id.$oid);

    document.getElementById("listadelchat").innerHTML = "";

    // recorre los mensajes y los agrega al html
    for (let i = 0; i < obj.chats.length; i++) {
        let node = document.createElement("li");
        // node.className += "un-contacto";

        var n = 0;
        if (obj.chats[i].users[0] == user_s) {
            n = 1;
        } else {
            n = 0;
        }

        node.innerHTML =
            `<div class="block unread" onclick="cambio('${obj.chats[i]._id.$oid}','${obj.chats[i].users[n]}')">
                        <div class="imgbx">
                            <img src="../img/Photo_perfil.png" class="cover" />
                        </div>
                        <div class="details">
                            <div class="listHead">
                                <h4>` +
            obj.chats[i].users[n] +
            `</h4>
                                <p class="time">12:06</p>
                            </div>
                            <div class="message_p">
                                <p>tu avance??</p>
                                <b>6</b>
                            </div>
                        </div>
                    </div>
                    `;
        // console.log(node);
        document.getElementById("listadelchat").appendChild(node);
        // console.log(obj.mensajes[i].user);
    }
}

// ACTIVAMOS SEMAFORO
activarReceptor();

// SEMAFORO
function activarReceptor() {
    semaforo = setInterval(verReceptores, 1000);
}
function verReceptores() {
    getReceptores();
}
function desactivarReceptores() {
    clearInterval(semaforo);
}
