<?php include "wea.php"; ?>

<html>

  <head>
      <meta charset="UTF-8" />
      <title>Login</title>
      <link rel="stylesheet" href="style_login.css" />
  </head>

  <body>
    <!-- DIV Contenedor del form -->
      <div class="div-contenedor-form">
          <form action="wea.php" method="POST">
              <h1>Login</h1>
              <input type="text" value="" class="inp" placeholder="User" /><br />
              <input type="password" value="" class="inp" placeholder="Password" /><br />
              <input type="submit"></input>
          </form>
          <a href="#">Olvidaste tu contraseña?</a>
      </div>
  </body>

</html>
