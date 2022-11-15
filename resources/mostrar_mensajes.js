async function getText() {
    const myObject = await fetch("../../src/read_mensajes.php", {
        method: "POST",
    });
    const obj = await myObject.json();

    document.getElementById("respuesta").innerHTML = "";
    // recorre los mensajes y los agrega al html
    for (let i = 0; i < obj.mensajes.length; i++) {
        let node = document.createElement("div");

        if (obj.mensajes[i].receptor == "Oscar") {
            // node.className += "message menssage_enviado";
            node.innerHTML = `
            <div class="message menssage_enviado">
                <p>
                    ${obj.mensajes[i].mensaje}<br />
                    <span>11:35</span>
                </p>
            </div>
            `;
            // let textnode = document.createTextNode(obj.mensajes[i].mensaje);
            // node.appendChild(textnode);
        } else {
            // node.className += "message menssage_recivido";
            // node.innerHTML = `<p>${obj.mensajes[i].mensaje}<br/><span>11:31</span></p>`;
            node.innerHTML = `
                <p>
                    ${obj.mensajes[i].mensaje}<br />
                    <span>11:35</span>
                </p>
            `;
            // let textnode = document.createTextNode(obj.mensajes[i].mensaje);
            // node.appendChild(textnode);
        }

        document.getElementById("respuesta").appendChild(node);
        // console.log(obj.mensajes[i].user);
    }
}

function activarChat() {
    semaforo = setInterval(verChat, 1000);
    window.scroll(0, 1000);
}
function verChat() {
    getText();
}
function desactivarChat() {
    clearInterval(semaforo);
}
