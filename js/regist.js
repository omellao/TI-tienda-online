const form = document.getElementById("form-signup");

const sendData = async dataUser => {
    const response = await fetch('../../src/insert.php', {
        method: 'POST',
        body: dataUser
    });

    return response.json();
};


const ab2str = buf => {
    return String.fromCharCode.apply(null, new Uint8Array(buf));
}

const getPrivateKey = async key => {
    const exported = await crypto.subtle.exportKey(
        "pkcs8",
        key
    );
    const exportedAsString = ab2str(exported);
    const exportedAsBase64 = window.btoa(exportedAsString);
    const pemExported = `-----BEGIN PRIVATE KEY-----\n${exportedAsBase64}\n-----END PRIVATE KEY-----`;

    return pemExported;
}

const getPublicKey = async key => {
    const exported = await crypto.subtle.exportKey(
        "spki",
        key
    );
    const exportedAsString = ab2str(exported);
    const exportedAsBase64 = window.btoa(exportedAsString);
    const pemExported = `-----BEGIN PUBLIC KEY-----\n${exportedAsBase64}\n-----END PUBLIC KEY-----`;

    return pemExported;
}

const getKeys = async () => {
    const algo = {
        name: "RSA-OAEP",
        modulusLength: 4096,
        publicExponent: new Uint8Array([1, 0, 1]),
        hash: "SHA-256"
    };
    const keys = await crypto.subtle.generateKey(algo, true, ["encrypt", "decrypt"]);

    const privateKey = await getPrivateKey(keys.privateKey).then(key => {return key});
    const publicKey = await getPublicKey(keys.publicKey).then(key => {return key});

    return {
        publicKey: publicKey,
        privateKey: privateKey
    };
};


form.addEventListener("submit", async event => {
    event.preventDefault();

    const userData = new FormData(form);

    const keys = await getKeys();

    userData.append("priv_key", keys.privateKey)
    userData.append("pub_key", keys.publicKey)

    console.log(userData);
    const status = await sendData(userData);

    console.log(status);
});