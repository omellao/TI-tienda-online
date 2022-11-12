document.querySelector('#icon-menu').addEventListener('click', leerDatos);

// import data from './contactos.json'

function leerDatos() {
    const xhttp = new XMLHttpRequest();

    xhttp.open('GET', 'contactos.json', true);

    xhttp.send();

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

            let datos = JSON.parse(this.responseText);

            let res = document.getElementById('contact-list');
            res.innerHTML = "";
            res.innerHTML = `<div class="search_chatt">
            <div>
                <input type="text" placeholder="Busca contactos">
                <ion-icon name="search-outline"></ion-icon>
            </div>
            </div>
            <div class="listadelcontactos">
                <img src="imgChats/grupo.png" class="imgt lista">
                <div>
                    <a href="chat.html" class="lista">
                        <li class="">Tu lista de contactos</li>
                    </a>
                </div>
            </div>`
            let data = datos.map((e) => (
                `<div>
                    <a href="chat.html" class="contacto">
                        <li class="listcontact">${e.name}</li>
                    </a>
                </div>`
            )).join("");
            res.innerHTML += data;
        }
    }
}