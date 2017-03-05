
<!DOCTYPE html>

<html lang="es">

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../img/logo/favicon.ico">
    <title> Ante Meridiem </title>
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Six+Caps" rel="stylesheet">

  </head>

  <body class="screen_publication">


    <div class="contenido" >

      <video autoplay muted loop id="videoby">

        <source src="../img/backgrounds/audioSpectrum.mp4" type="video/mp4">
      </video>
      <!--=============== HEADER =================-->

      <div class="header">
        <div class="header-logo">

          <img src="../img/logo/logoblack.jpg" alt="Logo">

        </div>
        <div class="header-center">

          <h2>Ante Meridiem</h2>
          <p> La agenda nocturna de Chivilcoy</p>

        </div>
        <div class="header-login">

          <img src="../img/images/icon-user.png" alt="User">
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

            <a href="http://localhost/WebMaster/php/screen_register.php">  Registrarse </a>

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

      <h2 class="back"> <a href="http://localhost/WebMaster/  index.php#home"> < Volver al Home </a> </h2>

      <div class="publication-content">
        <div class="publication">
          <div class="publication-img">
            <img src="../img/images/jack.jpeg" alt="imagen del evento">
          </div>

          <h2> Jack en Piluso Bar</h2>
          <ul>
            <li> [117] </li>
            <li> [32]</li>
          </ul>

          <h3> Lugar: Zaraza </h3>
          <span> Invita: </span>
          <span><a href=""> Tu puta madre, cabron </a></span>

          <div class="info-publication">
            <h4> 14.18.17 - 00.30 hs </h3>
            <h4> 14.18.17 - 04.30 hs </h3>
              <div class="description">
                <h3> Descripcion </h3>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas feugiat tempor urna, pellentesque suscipit metus feugiat id. Curabitur faucibus et turpis vel eleifend. Phasellus semper hendrerit lectus, in rhoncus ex facilisis ac. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tincidunt lorem quam, at tincidunt eros volutpat et. Nunc quis varius ex, id lacinia mauris. Ut quis bibendum mi. Praesent aliquam magna a orci lacinia, at iaculis metus sodales. Nam rutrum vitae elit eget euismod. Ut vel molestie leo, quis rutrum magna. Integer ornare quam lectus, ut molestie augue ullamcorper vitae
                 </p>
              </div>


          </div>
        </div>
      </div>

      <div class="publication-break">
      </div>
      <!-- ================== MY EVENTS ==================== -->


      <div class="myEvents">

        <div class="home-text">
          <h2 class="home-text">Lorem ipsum dolor sit amet</h2>
          <p class="home-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sagittis quam in massa fringilla pulvinar. Ut eget velit et neque feugiat tempor sit amet vitae enim. Aenean mattis felis non eros egestas, at aliquam ligula bibendum. Pellentesque viverra, felis nec lacinia rhoncus, nisi orci pulvinar ante, non accumsan turpis nisl sed sapien </p>
        </div>


            <div id="slideshow-container">
              <div id="slideshow">
                <div id="box1">
                  <div class="MyEventsImg">
                      <img src="../img/images/jack.jpeg">
                      <p> 27.08.2017 </p>
                  </div>

                  <div class="infoEvent">
                    <h2> Jack - Piluso </h2>
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam condimentum tincidunt mauris vel sodales. Praesent eget nisl ac purus dapibus aliquam a quis diam. Sed feugiat sit amet dui eu molestie. Nam vitae dignissim odio.</p>
                    <span><a href=""> Mas info </a></span>

                  </div>

                </div>
                <div id="box2">
                  <div class="MyEventsImg">
                      <img src="../img/images/a.jpeg">
                      <p> 02.09.2017 </p>
                  </div>

                  <div class="infoEvent">
                    <h2> AC/DC - River Plate </h2>
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam condimentum tincidunt mauris vel sodales. Praesent eget nisl ac purus dapibus aliquam a quis diam. Sed feugiat sit amet dui eu molestie. Nam vitae dignissim odio.</p>
                    <span><a href=""> Mas info </a></span>

                  </div>
                </div>
                <div id="box3">
                  <div class="MyEventsImg">
                      <img src="../img/images/jack.jpeg">
                      <p> 27.08.2017 </p>
                  </div>

                  <div class="infoEvent">
                    <h2> Jack - Piluso </h2>
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam condimentum tincidunt mauris vel sodales. Praesent eget nisl ac purus dapibus aliquam a quis diam. Sed feugiat sit amet dui eu molestie. Nam vitae dignissim odio.</p>
                    <span><a href=""> Mas info </a></span>

                  </div>
                </div>
                <div id="box4">
                  <div class="MyEventsImg">
                      <img src="../img/images/jack.jpeg">
                      <p> 27.08.2017 </p>
                  </div>

                  <div class="infoEvent">
                    <h2> Jack - Piluso </h2>
                    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam condimentum tincidunt mauris vel sodales. Praesent eget nisl ac purus dapibus aliquam a quis diam. Sed feugiat sit amet dui eu molestie. Nam vitae dignissim odio.</p>
                    <span><a href=""> Mas info </a></span>

                  </div>
                </div>
              </div>  <!--CIERRA SLIDESHOW -->



            </div> <!-- CIERRA SLIDESHOW-CONTAINER -->

      </div>




    <!-- ================== FOOTER ================-->

    <div class="footer">

      <ul>
        <li><a href="http://localhost/WebMaster/php/screen_footer.php">Contacto |</a></li>
        <li><a href="http://localhost/WebMaster/php/screen_footer.php">Sobre Ante Merídiem  |</a></li>
        <li><a href="http://localhost/WebMaster/php/screen_footer.php">Ayuda  |</a></li>
        <li><a href="http://localhost/WebMaster/php/screen_footer.php">Legales  |</a></li>
        <li><a href="http://localhost/WebMaster/php/screen_footer.php">Politica de Privacidad  |</a></li>
        <li><a href="http://localhost/WebMaster/php/screen_footer.php">© Copyright 2017  </a></li>
      </ul>

    </div>
    </body>




    </html>
