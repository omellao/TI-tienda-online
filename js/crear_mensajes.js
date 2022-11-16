// VARIABLES
let id_chat = "";
let recep = "";

// CAMBIO DE VARIABLE
function cambio(x, b) {
    id_chat = x;
    recep = b;
    // DE PASO ACTIVA LOS CHAT
    activarChat();

    console.log(id_chat, recep);
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


// const str2ab = str => {
//     const buf = new ArrayBuffer(str.length);
//     const bufView = new Uint8Array(buf);
//     for (let i = 0, strLen = str.length; i < strLen; i++) {
//         bufView[i] = str.charCodeAt(i);
//     }
//     return buf;
// }

// const importPrivateKey = pem => {
//     // fetch the part of the PEM string between header and footer
//     const pemHeader = "-----BEGIN PRIVATE KEY-----";
//     const pemFooter = "-----END PRIVATE KEY-----";
//     const pemContents = pem.substring(pemHeader.length, pem.length - pemFooter.length);
//     // base64 decode the string to get the binary data
//     const binaryDerString = window.atob(pemContents);
//     // convert from a binary string to an ArrayBuffer
//     const binaryDer = str2ab(binaryDerString);

//     return window.crypto.subtle.importKey(
//         "pkcs8",
//         binaryDer,
//         {
//             name: "RSA-OAEP",
//             hash: "SHA-256",
//             modulusLength: 4096
//         },
//         true,
//         ["decrypt"]
//     );
// }

// const importRsaKey = pem => {
//     // fetch the part of the PEM string between header and footer
//     const pemHeader = "-----BEGIN PUBLIC KEY-----";
//     const pemFooter = "-----END PUBLIC KEY-----";
//     const pemContents = pem.substring(pemHeader.length, pem.length - pemFooter.length);
//     // base64 decode the string to get the binary data
//     const binaryDerString = window.atob(pemContents);
//     // convert from a binary string to an ArrayBuffer
//     const binaryDer = str2ab(binaryDerString);

//     return window.crypto.subtle.importKey(
//         "spki",
//         binaryDer,
//         {
//             name: "RSA-OAEP",
//             hash: "SHA-256",
//             modulusLength: 4096
//         },
//         true,
//         ["encrypt"]
//     );
// }

// const getMessageEncoding = message => {
//     let enc = new TextEncoder();
//     return enc.encode(message);
// }

// const encryptMessage = (publicKey, message) => {
//     let encoded = getMessageEncoding(message);
//     return window.crypto.subtle.encrypt(
//         {
//             name: "RSA-OAEP",
//         },
//         publicKey,
//         encoded
//     );

// }

// const decryptMessage = (privateKey, ciphertext) => {
//     return window.crypto.subtle.decrypt(
//         {name: "RSA-OAEP"},
//         privateKey,
//         ciphertext
//     );
// }

// function ab2str(buf) {
//     return String.fromCharCode.apply(null, new Uint16Array(buf));
// }

// const str2ab2 = str => {
//     const buf = new ArrayBuffer(str.length * 2);
//     const bufView = new Uint16Array(buf);
//     for (let i = 0, strLen = str.length; i < strLen; i++) {
//         bufView[i] = str.charCodeAt(i);
//     }
//     return buf;
// }

// CREAMOS UN MENSAJE
async function form_mensajes(id) {
    const formulario = document.getElementById("formulario2");

    const dataIdChat = new FormData();
    dataIdChat.append("id", id);

    // const publicKeyRaw = await fetch("../../src/getPublicKey.php", {
    //     method: 'POST',
    //     body: dataIdChat
    // })
    //     .then(key => key.json())
    //     .then(key => {return key});

    // const publicKey = await importRsaKey(publicKeyRaw);
    let datosFormulario = new FormData(formulario);

    // const message = datosFormulario.get('message');

    // console.log(message)
    // const messageArrBuff = await encryptMessage(publicKey, message);

    // console.log(messageArrBuff)
    // const messageEncrypt = ab2str(messageArrBuff);

    // console.log(messageEncrypt)
    // datosFormulario.set("message", messageEncrypt);
    datosFormulario.append("id_chat", id);

    // FETCH
    const response = await fetch("../../src/agregar_mensaje.php", {
        method: "POST",
        body: datosFormulario
    })
        .then(wea => wea.json())
        .then(wea2 => {return wea2});

    // console.log(response.mensaje)

    // const formulario3 = document.getElementById("formulario3");
    // let datosFormulario3 = new FormData(formulario3);
    // datosFormulario3.append("id_chat", id);

    // const privateKeyRaw = await fetch('../../src/getPrivateKey.php')
    //     .then(key => key.json())
    //     .then(key => {return key});

    // const privateKey = await importPrivateKey(privateKeyRaw);

    // const mensageEncrypt = await fetch("../../src/read_mensajes.php", {
    //     method: "POST",
    //     body: datosFormulario3
    // })
    //     .then(wea => wea.json())
    //     .then(WEA => {return WEA.messages[WEA.messages.length - 1].mensaje});

    // console.log(mensageEncrypt);

    // const mensajeDec = str2ab2(mensageEncrypt);

    // console.log(mensajeDec);

    // const messageDecrypt = await decryptMessage(privateKey, messageArrBuff)

    // console.log(messageDecrypt)
}

// LEER MENSAJES
async function form(id) {

    const responseName = await fetch("../../src/getUsername.php", {
        method: 'GET'
    });

    const username = await responseName.json();

    const formulario3 = document.getElementById("formulario3");
    let datosFormulario3 = new FormData(formulario3);
    datosFormulario3.append("id_chat", id);

    // FETCH
    const response = await fetch("../../src/read_mensajes.php", {
        method: "POST",
        body: datosFormulario3
    });

    // const respuesta = await response.text();
    const obj = await response.json();

    if (!obj.messages) return;

    document.getElementById("respuesta").innerHTML = "";
    // recorre los mensajes y los agrega al html
    for (let i = 0; i < obj.messages.length; i++) {
        let node = document.createElement("div");

        if (obj.messages[i].emisor == username) {
            node.className += "message menssage_enviado";


            //             const privateKeyRaw = await fetch('../../src/getPrivateKey.php')
            //                 .then(key => key.json())
            //                 .then(key => {return key});

            // const privateKey = await importPrivateKey(privateKeyRaw);

            //             const messageBase64 = obj.messages[i].mensaje;

            //             const messageDec = base64ToArrayBuffer(messageBase64);

            //             const message = await decryptMessage(privateKey, messageDec);

            //             console.log(message)
            // console.log(message);
            node.innerHTML = `
                <p>
                    ${obj.messages[i].mensaje}<br />
                    <span>${obj.messages[i].date}</span>
                </p>
            `;
        } else {
            node.className += "message menssage_recibido";

            // const privateKeyRaw = await fetch('../../src/getPrivateKey.php')
            //     .then(key => key.json())
            //     .then(key => {return key});

            // const privateKey = await importPrivateKey(privateKeyRaw);

            // const messageBase64 = obj.messages[i].mensaje;

            // const messageDec = base64ToArrayBuffer(messageBase64);

            // const message = decryptMessage(privateKey, messageDec);

            // console.log(message);

            console.log(message);
            node.innerHTML = `
                <p>
                    ${message}<br />
                    <span>${obj.messages[i].date}</span>
                </p>
                `;
        }

        document.getElementById("respuesta").appendChild(node);
        // console.log(obj.mensajes[i].user);
    }
    document.getElementById("nav-chat").innerHTML = "";
    let node2 = document.createElement("div");
    node2.className += "imgText";
    node2.innerHTML = `
                    <div class="userimg">
                        <a href="perfil.html">
                            <img src="../img/cara1.png" class="cover" />
                        </a>
                    </div>
                    <h4 class="imgTexth4">${recep} <br/><span>En linea</span></h4>
                    `;
    // console.log(obj.mensajes[i].receptor);
    document.getElementById("nav-chat").appendChild(node2);
}
