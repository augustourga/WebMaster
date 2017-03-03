<!DOCTYPE html>

<html lang="es">

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../img/logo/favicon.ico">
    <title> Ante Meridiem </title>
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Six+Caps" rel="stylesheet">

  </head>

  <body class="publicacion">


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

      <div class="publicacion-content">
        <div class="left">
          <div class="img-publicacion">
            <img src="../img/images/a.jpeg" alt="Imagen de la Banda">
            <p> </p>
          </div>

        </div>

        <h2 class="title"> Nombre del Evento </h2>

        <div class="center">

          <div class="center-scroll">
          <iframe style="pointer-events:none;" id="mapa" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3272.2829212771367!2d-60.021568284287184!3d-34.899348880708104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bea536b1f6171f%3A0x3e79c823b98957d3!2sLavalle+79%2C+Chivilcoy%2C+Buenos+Aires!5e0!3m2!1ses!2sar!4v1488186616396" width="600" height="350" frameborder="0" style="border:0" allowfullscreen scrolling="no"></iframe>
          <div class="info-publicacion">
            <h2> Descripcion del Evento</h2>
            <h3> Asistentes: </h3>
            <p>

              Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean dignissim iaculis augue, nec consectetur dui maximus sed. In in enim dolor. Praesent tristique ac lacus sed congue. Nam lacinia efficitur tortor. Donec aliquam porttitor ipsum, sed lobortis dolor. Integer venenatis dapibus ultricies. Proin consectetur velit id porttitor feugiat. Quisque metus massa, vehicula eu libero quis, auctor malesuada lectus. Sed elementum libero eu leo maximus, sed pretium dolor commodo. Fusce ut nunc sed felis blandit euismod quis eget odio. Nunc facilisis leo quis convallis sagittis. Aenean eget eros gravida, laoreet ipsum ac, elementum massa.

              Nullam viverra placerat orci sed bibendum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Ut sit amet felis nunc. Proin ornare nulla sapien. Pellentesque dignissim sem non ipsum ultricies, et commodo neque euismod. Cras nec dolor consectetur, laoreet sapien vitae, auctor leo. Vestibulum eros orci, elementum a metus ut, venenatis dictum felis. Phasellus condimentum odio orci, imperdiet imperdiet urna vestibulum at. Aenean eu magna eget quam convallis varius.
           </p>
           <p>


             Nunc tincidunt risus vel augue ultrices gravida ac quis nisi. Suspendisse potenti. Suspendisse id rutrum neque. Fusce imperdiet lorem nec viverra eleifend. Fusce vitae felis sodales, ullamcorper felis ut, porttitor nisl. Phasellus a libero ex. Maecenas tincidunt sem viverra quam mattis tempor. Nunc maximus viverra elit, ac viverra urna pulvinar ut. Phasellus ipsum arcu, mollis et lobortis eu, lacinia eu ligula. Pellentesque laoreet dui tempor diam pulvinar dignissim. Cras faucibus eget lectus sit amet mollis.

             Quisque vulputate tortor vestibulum accumsan egestas. In posuere magna justo, quis egestas libero consectetur ut. Fusce vitae molestie urna, sed porta ante. Cras faucibus orci orci, sed tempor leo viverra vitae. Fusce vestibulum nibh nec tempus vestibulum. Pellentesque placerat sagittis urna, a dignissim orci eleifend et. Nulla suscipit hendrerit ex. Quisque maximus a turpis et faucibus. Aliquam in congue mi. Ut aliquam, risus eget blandit pulvinar, massa quam tincidunt felis, quis mollis massa est ut leo. Sed ornare nulla velit, in ullamcorper nulla mattis id. Integer fermentum quam eu enim condimentum, sit amet congue lorem venenatis. Nulla vel metus aliquet, tincidunt ipsum in, sollicitudin libero. Suspendisse faucibus varius nisl eget vehicula.

           </p>
          </div>
          <div class="info-comentarios">
            <h3> Comentarios: </h3>
            <br>
            <div class="show-comentarios">

            </div>
            <form action="" method="">
              <input type="text">
            </form>
            <br>
            <button> Enviar Comentario </button>
          </div>
        </div>
        </div>
        </div>

        <div class="right">

            <iframe id="fb" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FACDC-1466991096895768%2F%3Ffref%3Dts&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="700px" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>

        </div>
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
