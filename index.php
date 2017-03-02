<!DOCTYPE html>

<html lang="es">

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Six+Caps" rel="stylesheet">

  </head>

  <body>
        <!--=============== INTRO =================-->


    <div class="intro">
      <video autoplay muted loop id="videoby">

        <source src="img/backgrounds/audioSpectrum.mp4" type="video/mp4">
      </video>
        <h1 id="introA">Meridiem</h1>
        <h1 id="introB">Ante</h1>
        <p id="introC">Agenda Nocturna</p>

    </div>

     <!--=============== MAIN CONTENT =================-->

    <div class="main-content" >



      <!--=============== HEADER =================-->

      <div class="header" id="home">
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


        <!-- ================= FORMULARIO REGISTRO ==================== -->
    <!--


      <!-- ================ CONTENIDO ============== -->

      <div class="contenido">
        <div class="home-text">
          <h2 class="home-text">Lorem ipsum dolor sit amet</h2>
          <p class="home-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sagittis quam in massa fringilla pulvinar. Ut eget velit et neque feugiat tempor sit amet vitae enim. Aenean mattis felis non eros egestas, at aliquam ligula bibendum. Pellentesque viverra, felis nec lacinia rhoncus, nisi orci pulvinar ante, non accumsan turpis nisl sed sapien </p>
        </div>
        <div class="next-events">
          <h2> Proximos Eventos</h2>
          <div class="cartelera">
            <ul>
              <li><a href="http://localhost/WebMaster/php/screen_publication.php"> Jack - Piluso 27.08.17 </a></li>
              <li><a href="http://localhost/WebMaster/php/screen_publication.php"> Oesterheld - La Ronda 27.08.17 </a></li>
              <li><a href="http://localhost/WebMaster/php/screen_publication.php"> La Parna - Bartolo 27.08.17 </a></li>
              <li><a href="http://localhost/WebMaster/php/screen_publication.php"> Jack - Los indios 27.08.17 </a></li>
              <li><a href="http://localhost/WebMaster/php/screen_publication.php"> La Parna - Bartolo 27.08.17 </a></li>

            </ul>
          </div>
        </div>

        <div class="events">


          <div class="publicaciones-content">

            <div class="publicaciones">

              <h2>Banda Show Bar Cultural 'Los Indios'</h2>

              <img class="portada" src="img/images/jack.jpeg">
              <span>Sabado a la hora que pinte</span>
              <br>
              <a href="http://localhost/WebMaster/php/screen_publication.php"> mas informacion</a>

            </div>

            <div class="publicaciones">

              <h2>Banda Show Bar Cultural 'Los Indios'</h2>
              <img class="portada" src="img/images/a.jpeg">
              <span>Sabado a la hora que pinte</span>
              <br>
              <a href="http://localhost/WebMaster/php/screen_publication.php"> mas informacion</a>

            </div>

            <div class="publicaciones">

              <h2>Banda Show Bar Cultural 'Los Indios'</h2>
              <img class="portada" src="img/publicaciones/modelimg.png">
              <span>Sabado a la hora que pinte</span>
              <br>
              <a href="http://localhost/WebMaster/php/screen_publication.php"> mas informacion</a>

            </div>

            <div class="publicaciones">

              <h2>Banda Show Bar Cultural 'Los Indios'</h2>
              <img class="portada"  src="img/publicaciones/modelimg.png">
              <span>Sabado a la hora que pinte</span>
              <br>
              <a href="http://localhost/WebMaster/php/screen_publication.php"> mas informacion</a>

            </div>

            <div class="publicaciones">

              <h2>Banda Show Bar Cultural 'Los Indios'</h2>
              <img class="portada" src="img/publicaciones/modelimg.png">
              <span>Sabado a la hora que pinte</span>
              <br>
              <a href="http://localhost/WebMaster/php/screen_publication.php"> mas informacion</a>

            </div>

            <div class="publicaciones">

              <h2>Banda Show Bar Cultural 'Los Indios'</h2>
              <img class="portada" src="img/publicaciones/modelimg.png">
              <span>Sabado a la hora que pinte</span>
              <br>
              <a href="http://localhost/WebMaster/php/screen_publication.php"> mas informacion</a>

            </div>

            <div class="publicaciones">

              <h2>Banda Show Bar Cultural 'Los Indios'</h2>
              <img class="portada" src="img/publicaciones/modelimg.png">
              <span>Sabado a la hora que pinte</span>
              <br>
              <a href="http://localhost/WebMaster/php/screen_publication.php"> mas informacion</a>

            </div>

            <div class="publicaciones">

              <h2>Banda Show Bar Cultural 'Los Indios'</h2>
              <img class="portada" src="img/publicaciones/modelimg.png">
              <span>Sabado a la hora que pinte</span>
              <br>
              <a href="http://localhost/WebMaster/php/screen_publication.php"> mas informacion</a>

            </div>

          </div>

          <div class="filtros-publicaciones">
              <h3>Filtrar por:</h3>
              <form action="" method="">
                <label>
                  <select name="genero">
                    <option value="rock">Rock</option>
                    <option value="funk">Funk</option>
                    <option value="soul">Soul</option>
                    <option value="reggae">Reggae</option>
                    <input type="submit" value="submit">
                  </select>
                </label>

                <label>
                  <select name="fecha">
                    <option value="esteSemana">Este Semana</option>
                    <option value="esteMes">Este Mes</option>
                    <input type="submit" value="submit">
                  </select>
                </label>

                <label>
                  <select name="lugar">
                    <option value="bartolo">Bartolo</option>
                    <option value="piluso">Piluso</option>
                    <option value="losIndios">Los Indios</option>
                    <option value="shotBar">ShotBar</option>
                    <input type="submit" value="submit">
                  </select>
                </label>
          </div>

          <a href=""> Crear Evento </a>

        </div> <!-- CIERRA EVENTS -->


        <div class="myEvents">

          <div class="home-text">
            <h2 class="home-text">Mis Eventos</h2>
            <p class="home-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sagittis quam in massa fringilla pulvinar. Ut eget velit et neque feugiat tempor sit amet vitae enim. Aenean mattis felis non eros egestas, at aliquam ligula bibendum. Pellentesque viverra, felis nec lacinia rhoncus, nisi orci pulvinar ante, non accumsan turpis nisl sed sapien </p>
          </div>


              <div id="slideshow-container">
                <div id="slideshow">
                  <div id="box1">
                    <div class="MyEventsImg">
                        <img src="img/images/jack.jpeg">
                        <p> 27.08.2017 </p>
                    </div>

                    <div class="infoEvent">
                      <h2> Jack - Piluso </h2>
                      <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam condimentum tincidunt mauris vel sodales. Praesent eget nisl ac purus dapibus aliquam a quis diam. Sed feugiat sit amet dui eu molestie. Nam vitae dignissim odio.</p>
                      <span><a href="http://localhost/WebMaster/php/screen_publication.php"> Mas info </a></span>

                    </div>

                  </div>
                  <div id="box2">
                    <div class="MyEventsImg">
                        <img src="img/images/a.jpeg">
                        <p> 02.09.2017 </p>
                    </div>

                    <div class="infoEvent">
                      <h2> AC/DC - River Plate </h2>
                      <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam condimentum tincidunt mauris vel sodales. Praesent eget nisl ac purus dapibus aliquam a quis diam. Sed feugiat sit amet dui eu molestie. Nam vitae dignissim odio.</p>
                      <span><a href="http://localhost/WebMaster/php/screen_publication.php"> Mas info </a></span>

                    </div>
                  </div>
                  <div id="box3">
                    <div class="MyEventsImg">
                        <img src="img/images/jack.jpeg">
                        <p> 27.08.2017 </p>
                    </div>

                    <div class="infoEvent">
                      <h2> Jack - Piluso </h2>
                      <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam condimentum tincidunt mauris vel sodales. Praesent eget nisl ac purus dapibus aliquam a quis diam. Sed feugiat sit amet dui eu molestie. Nam vitae dignissim odio.</p>
                      <span><a href="http://localhost/WebMaster/php/screen_publication.php"> Mas info </a></span>

                    </div>
                  </div>
                  <div id="box4">
                    <div class="MyEventsImg">
                        <img src="img/images/jack.jpeg">
                        <p> 27.08.2017 </p>
                    </div>

                    <div class="infoEvent">
                      <h2> Jack - Piluso </h2>
                      <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam condimentum tincidunt mauris vel sodales. Praesent eget nisl ac purus dapibus aliquam a quis diam. Sed feugiat sit amet dui eu molestie. Nam vitae dignissim odio.</p>
                      <span><a href="http://localhost/WebMaster/php/screen_publication.php"> Mas info </a></span>

                    </div>
                  </div>
                </div>  <!--CIERRA SLIDESHOW -->



              </div> <!-- CIERRA SLIDESHOW-CONTAINER -->

        </div>


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


      </div> <!-- CIERRA CONTENIDO-->



      </div> <!-- Cierra MAIN CONTET-->

      <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
      <script src="js/animation.js"></script>
  </body>

</html>
