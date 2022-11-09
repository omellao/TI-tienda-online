const form = document.getElementById('.formulario');

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
