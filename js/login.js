const form = document.getElementById("form-login");

const sendData = async dataUser => {
    const response = await fetch('../../src/login.php', {
        method: 'POST',
        body: dataUser
    });

    return response.json();
};



form.addEventListener("submit", async event => {
    event.preventDefault();

    const userData = new FormData(form);
    const response = await sendData(userData);

    console.log(response);
    if (response.status == 0) {
        window.location.replace("../chats/chats.html");
    }
});

