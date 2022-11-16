<?php
    session_start();
    session_regenerate_id();
    if(!isset($_SESSION['username'])) {
        header("Location: /~oscar/TI-tienda-online/views/algo/login_register.html");
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>GOUS</title>
        <!-- CSS -->
        <link rel="stylesheet" href="../../css/style-chats.css" />
        <link rel="stylesheet" href="../../css/style-chat.css" />
        <link rel="stylesheet" href="../../css/style-contactos.css" />
    </head>
    <body>
        <!-- CUADRO GENERAL -->
        <div class="cuadro_central">
            <!-- LADO IZQUIERDO -->
            <div class="ladoizquierdo">
                <!-- HEADER -->
                <div class="header">
                    <!-- IMAGEN USER -->
                    <div class="perfilimg">
                        <img src="../img/Photo_perfil.png" class="cover" />
                    </div>
                    <h3 style="color: white;"><?php echo $_SESSION['username']; ?></h3>
                    <!-- BOTONES -->
                    <ul class="nav_icons">
                        <li id="boton-contacto">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAASlJREFUSEvtltFNw0AMhr9/AhiBDegGLROUEWADNqCdoCvABC0TwAiwASPABEaW7qImTeJKlyMvvbdIsb+z/Z9tMdPRTFxCsJldA2vgpuCS38CbpJ/sYxScoO/AogCaTT+BuwyPwE/AbgJodvEo6cU/wlSXQM3sHnDQVfKzlbSpDnZAgu9HwbWEZGY2CK4ppAhcTUgR2Iv+XCKmjm0jpAu49ZzM7JLqUp31ieu0Zf5Dqr+A1cmQqAx+AA69Y7EmuK9mzXSaE1ytZUYR+4rzAdyWyhloCWkUnGanw3145/1qBSx7DN3xYeCCvl+1hBSCuz8M1P1Vkqu06EQ7V7eNNg2giBrtXEcR/6bH75viJOeciL3mTceZhHpGxAtJk0V5fOmq6+1YdmYD/wEE9MIf65xVTgAAAABJRU5ErkJggg=="/>
                        </li>
                        <li>
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAANNJREFUSEvtleEJwkAMRl82cBN1gzqBjqAbuIF1AldwBJ1AR9BN3CASSEEK0suhPQp3P0vKy/uS44RCRwpxqeDRks+KWlW3wMG7PIrIOdpxGKyqDXDrgZYi8ojAc8Dth23HMmv7nnxywGWMTcln3Bm2o8w4OcuBwnDURcGqOgPW3sRVRF7RhsLGDrXrtHCYXaNVFJ4D3gOnnuEuumCTAtt878DcrZ9A8/eo/R4bfOPgSxRq/4Wjjm7vt/ppgeuzCNRncXD5p7XVgzoJBdU4IaTflLwBaQBSH2McyrEAAAAASUVORK5CYII="/>
                        </li>
                    </ul>
                </div>
                <!-- BUSCADOR -->
                <div class="search_chat">
                    <div>
                        <input type="text" placeholder="Busca..." />
                    </div>
                </div>
                <!-- CONTACTO ULTIMO MENSAJE -->
                <div class="listadelchat" id="listadelchat">
                    <!-- LIANDING -->
                    <p id="loanding">CARGANDO...</p>
                    <!-- <div style="display: block"> -->
                </div>
                <!-- FORM NO OCUPACIONAL -->
                <div style="display: none">
                    <form action="" method="post" id="formulario">
                        <input type="text" name="nombre" disabled />
                        <input type="submit" id="submit" value="Enviar" />
                    </form>
                </div>
                <div style="display: none">
                    <form action="" method="post" id="formulario3">
                        <input type="text" name="nombre" disabled />
                        <input type="submit" id="submit" value="Enviar" />
                    </form>
                </div>
            </div>
            <div class="ladoderecho">
                <div class="header-chat" id="nav-chat">
                    <!-- <div class="imgText">
                        <div class="userimg">
                            <a href="perfil.html">
                                <img src="../img/cara1.png" class="cover" />
                            </a>
                        </div>
                        <h4 class="imgTexth4">
                            Oscar <br />
                            <span>En linea</span>
                        </h4>
                    </div> -->
                </div>
                <div class="cont-messages" id="cont-mensaje">
                    <div class="contenedor-mensajes scroll" id="respuesta">
                        <!-- AQUI LLEGAN LOS MENSAJES -->
                    </div>
                </div>
                <div class="buscar">
                    <form action="" method="post" id="formulario2">
                        <input
                            type="text"
                            name="message"
                            placeholder="Mensaje..."
                            class="input-message" />
                        <input
                            type="submit"
                            value="📤"
                            id="env_form"
                            class="btn" />
                    </form>
                </div>
            </div>
        </div>
        <!-- CONTACTOS -->
        <div class="cont-contactor-fondo" id="contac2">
            <div class="contenedor-contactos" id="contac">
                <ul class="lista-contactos"></ul>
            </div>
        </div>
        <!-- JS  -->
        <script src="../../js/crear_contactos.js"></script>
        <script src="../../js/crear_mensajes.js"></script>
        <script src="../../js/mostrar_receptores.js"></script>
    </body>
</html>
