const form = document.getElementById("login");

const sendData = async dataUser => {
  const response = await fetch('../../src/login.php', {
      method: 'POST',
      body: dataUser
  });

  return await response.json();
};

form.addEventListener("submit", async event => {
  event.preventDefault();

  const userData = new FormData(form);
  const status = await sendData(userData);

  console.log(status);
});

function validar(){
  var username = document.getElementById("name").value;
  var password = document.getElementById("pass").value;
  if ( username == "Formget" && password == "formget#123"){
  alert ("Logueado exitosamente");
  window.location = "index.html"; // Redireccionado a otra pagina
  return false;
  }
  else{}
}