const formLogin = document.getElementById("form-login");

const sendLogin = async dataUser => {
    const response = await fetch('../../src/login.php', {
        method: 'POST',
        body: dataUser
    });

    return response.json();
};



formLogin.addEventListener("submit", async event => {
    event.preventDefault();

    const userData = new FormData(formLogin);
    const response = await sendLogin(userData);

    alert(response.msg);
    if (response.status)
        window.location.replace("../chats/chats.php");
});

