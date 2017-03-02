<!DOCTYPE html>

<html lang="es">

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Six+Caps" rel="stylesheet">

  </head>

  <body class="footerPage">


    <div class="contenido" >

      <video autoplay muted loop id="videoby">

        <source src="img/backgrounds/audioSpectrum.mp4" type="video/mp4">
      </video>
      <!--=============== HEADER =================-->

      <div class="header">
        <div class="header-logo">

          <img src="img/logo/logoblack.jpg" alt="Logo">

        </div>
        <div class="header-center">

          <h2>Ante Meridiem</h2>
          <p> La agenda nocturna de Chivilcoy</p>

        </div>
        <div class="header-login">

          <img src="img/images/icon-user.png" alt="User">
          <form method="POST" action="php/login.php" >
            <label class="user">
              <input type="text" placeholder="User" name="user_name" required>
            </label>

            <br>

            <label class="password">
              <input type="password" placeholder="Password" name="password" required>
            </label>

          <br>

          <button type="submit" name="acceder" value="acceder">
            Acceder
          </button>

              <a href="http://localhost:8888/Sitio%202.0/registro.php">  Registrarse </a>

          </form>



        </div> <!-- Cierra LOGIN-->

        </div> <!-- Cierra HEADER -->

    <!-- ================ BUSCADOR ======================-->

        <div class="buscador">

            <form action="" method="">
                <input class="busqueda" type="" placeholder="Ingrese aqui su busqueda" required>
                <input type="submit" value="Buscar">
              </form>
        </div>

      <!-- ================== MAIN-CONTENT =============-->

      <h2 class="back"> <a href="http://localhost:8888/Sitio%202.0#home"> < Volver al Home </a> </h2>



    <!-- ================== FOOTER ================-->

    <div class="footer">

      <ul>
        <li><a href="http://localhost:8888/Sitio%202.0/footer.php">Contacto |</a></li>
        <li><a href="http://localhost:8888/Sitio%202.0/footer.php">Sobre Ante Merídiem  |</a></li>
        <li><a href="http://localhost:8888/Sitio%202.0/footer.php">Ayuda  |</a></li>
        <li><a href="http://localhost:8888/Sitio%202.0/footer.php">Legales  |</a></li>
        <li><a href="http://localhost:8888/Sitio%202.0/footer.php">Politica de Privacidad  |</a></li>
        <li><a href="http://localhost:8888/Sitio%202.0/footer.php">© Copyright 2017  </a></li>
      </ul>

    </div>

    </body>




    </html>
