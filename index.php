<?php
session_start();


      include("php/connections.php");

      include("php/functions.php");




     /* $conexion = mysqli_connect('localhost','root','augus32311213','agenda_online') or die ("Error en la conexion");*/
      $a=" SELECT publicaciones.id_publication , publicaciones.user_name , publicaciones.title , publicaciones.description , publicaciones.text , publicaciones.address , publicaciones.date_initiation , publicaciones.date_end , publicaciones.gender, COUNT( DISTINCT(i.user_name)) AS interesados , COUNT(DISTINCT(a.user_name)) AS asistentes, publicaciones.image FROM publicaciones AS publicaciones
           LEFT OUTER JOIN assistants AS a USING(id_publication)
           LEFT OUTER JOIN interested AS i USING(id_publication)
           WHERE publicaciones.date_initiation> CURDATE()
           GROUP BY id_publication ";

      /*Traeme*/
      $publicaciones = mysqli_query($conexion,$a) or die (mysqli_error($conexion));


      if($publicaciones){


            $cant_reg_consulta= mysqli_num_rows($publicaciones);

               if ($cant_reg_consulta>0) {

                        $estado_publicacion = true;

                         /* /* id_publication , user_name , title , description , text , address , date_initiation , date_end , gender, interesados , asistentes img*/

                          /*   0                   1        2           3        4       5            6               7          8        9             10 *     11/*/
                          /*Traeme los interesados en el evento SELECT  COUNT(*) FROM interested WHERE id_publication = 6  */

                    }/*Cierro el if $cant_reg_consulta>0*/else{
                      $estado_publicacion = false;
                    }
                  }/*Cierro el if Consulta*/else{
                                    echo "fallo la consulta";
                  }

?>

<!DOCTYPE html>

<html lang="es">

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/logo/favicon.ico">
    <title> Ante Meridiem </title>
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Six+Caps" rel="stylesheet">

  </head>

  <body>
        <!--=============== INTRO =================-->
      <?php
      if ((!isset($_SESSION["user_name"])&&(!isset($_GET['ocultar'])))) {
      ?>

    <div class="intro">
      <video autoplay muted loop id="videoby">

        <source src="img/backgrounds/audioSpectrum.mp4" type="video/mp4">
      </video>
        <h1 id="introA">Meridiem</h1>
        <h1 id="introB">Ante</h1>
        <p id="introC"> <a href="index.php?ocultar=true#home">Agenda Nocturna</a></p>

    </div>
    <?php
    }else{
      ?>
        <style type="text/css">
          .footer {
            background-image: url( "img/backgrounds/audioSpectrum_gif.gif");
            background-size: cover;
            background-position: 80% 90%;
            opacity: 0.9;
          }
        </style>
      <?php
      }  ?>


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
        </a>
        <div class="header-login">

          <img src="img/images/icon-user.png" alt="User">
          <form method="POST" action="php/login.php" >

              <?php

              if (isset($_GET["estado"])) {

                  if($_GET["estado"]== "error"){ ?>
                    <script type="text/javascript">
                      window.alert("Los datos ingresados son incorrectos");
                      window.location.href= 'index.php?ocultar=true#home';


                    </script>
                  <?php

                  unset($_GET["estado"]);

                }else{ if($_GET["estado"]== "bloqueado"){?>

                    <script type="text/javascript">
                      window.alert("Usuario Bloqueado");
                      window.location.href= 'index.php?ocultar=true#home';
                    </script>




              <?php

                }
              }

              } else{

              if(isset($_SESSION['user_name']))  {

              ?>
                 <!-- Cerrar sesion</button> -->
                <ul class="show_name">
                    <li>
                      <a href="php/screen_user.php?user=<?php echo $_SESSION['user_name'];
                         ?>"><?php echo $_SESSION['user_name'];?>                   </a>
                    </li>
                    <input type="button" id="button_close_session" value="Cerrar Sesión">

                </ul>

                   <script type="text/javascript">

                      function redirect_unlogin(){
                      window.location.href= 'php/unlogin.php';
                    }

                    var button_close_session = document.getElementById("button_close_session");
                    button_close_session.addEventListener("click", redirect_unlogin);

                      </script>
                  <!--  TERMINA Cerrar sesion</button> -->
              <?php

              } else {


                  ?>




            <label class="user">
              <input type="text" placeholder="User or Email" name="user_name" required>
            </label>

            <br>

            <label class="password">
              <input type="password" placeholder="Password" name="password" required>
            </label>

          <br>

          <button type="submit" name="acceder" value="acceder">
            Acceder
          </button>

              <a href="php/screen_register.php">  Registrarse </a>

              <?php
              } /*cierra el else isset($_SESSION['user_name']) */
            }/*Cierra el else isset($_GET["estado"])*/
            ?>

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
             <?php $consulta_cartelera="
                    SELECT publicaciones.id_publication , publicaciones.user_name , publicaciones.title , publicaciones.description , publicaciones.text , publicaciones.address , publicaciones.date_initiation , publicaciones.date_end , publicaciones.gender, COUNT( DISTINCT(i.user_name)) AS interesados , COUNT(DISTINCT(a.user_name)) AS asistentes,publicaciones.image FROM publicaciones AS publicaciones
                    LEFT OUTER JOIN assistants AS a USING(id_publication)
                    LEFT OUTER JOIN interested AS i USING(id_publication)
                    WHERE publicaciones.date_initiation BETWEEN CURDATE() AND CURDATE()+7
                    GROUP BY id_publication ";

      /*Traeme*/
      $publicaciones_cartelera = mysqli_query($conexion,$consulta_cartelera) or die (mysqli_error($conexion));

       if($publicaciones_cartelera){


            $cant_reg_consulta_cartelera= mysqli_num_rows($publicaciones_cartelera);
            if ($cant_reg_consulta_cartelera>0) {
                while ($publicacion_cartelera =mysqli_fetch_row($publicaciones_cartelera)) {
                   /* id_publication , user_name , title , description , text , address , date_initiation , date_end , gender, interesados , asistentes*/

                          /*   0                   1        2           3        4       5            6               7          8        9             10 */
                  ?>

                          <li><a href="php/screen_publication.php?id_publication=<?php echo $publicacion_cartelera[0];  ?>"> <?php echo $publicacion_cartelera[2];  ?> -  <?php echo $publicacion_cartelera[6];  ?> </a></li>

             <?php
                      }/*<!-- Cierra el While  Publicaciones_cartelera-->*/
                    }/*Cierra el if cant_reg_ carteñera*/else{
                      ?>
                           <li><a > No hay eventos proximos </a></li>

                      <?php

                    }/*Cierra el else cant_reg_ carteñera */
                  }/*Cierra el if(publicaciones_cartelera)*/
                  else{
                      ?>
                           <li><a > No hay eventos proximos </a></li>

                      <?php
                          }
                    ?>

            </ul>
          </div>
        </div>

        <div class="events">

                    <!-- CREAR EVENTO -->

                           <?php if(isset($_SESSION['user_name']))  {

                            ?>
                            <a href="php/screen_add_event.php"> <img id="addEventImg" src="img/images/addButton.png" alt=""> </a>


                            <?php
                                }/*Cierra el  if(isset($_SESSION['user_name'])) */

                            ?>




                    <!-- CIERRA CREAR EVENTO -->

          <div class="publicaciones-content">
          <?php
          if ($estado_publicacion) {

          while ($publicacion =mysqli_fetch_row($publicaciones)) {
                 /*/* id_publication , user_name , title , description , text , address , date_initiation , date_end , gender, interesados , asistentes img*/

                          /*   0                   1        2           3        4       5            6               7          8        9             10 *     11/*/
            ?>
            <div class="p-contenedor">
              <div class="publicaciones">
                <div class="title-publication">
                  <h2><?php echo $publicacion[2];  ?></h2>
                </div>
                <div class="img-content">
                  <img class="portada" src="<?php echo $publicacion[11];  ?>">
                </div>
                <br>

                <p > <?php echo $publicacion[6]; ?></p>



                <div class="publicaciones-b"   >

                <?php
                 if(isset($_SESSION['user_name']))  {


                    if(are_u_interested($_SESSION['user_name'], $publicacion[0])){
                    ?>
                   <p > Interesados: [<?php echo $publicacion[9];  ?>] </p><a href="php/interaction.php?id_publication=<?php echo $publicacion[0];?>&action=imninterested"><img class="rockHand" src="img/images/handRockIII.jpg" ></a>
                  <?php
                  /*onclick <?php desinterest_me($publicacion[0]); ?> */
                }/*Cierra el ifim_interesting*/
                    else{
                    ?>
                  <p > Interesados: [<?php echo $publicacion[9];  ?>] </p><a href="php/interaction.php?id_publication=<?php echo $publicacion[0];?>&action=iminterested"><img class="rockHand" src="img/images/handRockI.jpg" ></a>

                  <?php
                  /*onclick <?php interest_me($publicacion[0]); ?>*/
                            } /*Cierra el elseim_interesting*/
                    if(are_u_assistant($_SESSION['user_name'], $publicacion[0])){  ?>
                  <br><p>Asistentes: [<?php echo $publicacion[10];  ?>] </p><a href="php/interaction.php?id_publication=<?php echo $publicacion[0];?>&action=imngoing"><img class="rockHand" src="img/images/handRockIII.jpg" ></a><br>
                  <?php
                  /*Onclick <?php desassistant_me($publicacion[0]); ?>"*/
                   }/*Cierra el ifim_assistant*/
                    else{
                  ?>
                    <br><p>Asistentes: [<?php echo $publicacion[10];  ?>] </p><a href="php/interaction.php?id_publication=<?php echo $publicacion[0];?>&action=imgoing"><img class="rockHand" src="img/images/handRockI.jpg"  ></a><br>
                  <?php
                  /*onclick <?php assistant_me($publicacion[0]);?>*/
                        }
                          } /*Cierra el ifisset*/
                 else {
                    ?>
                    <p> Interesados: [<?php echo $publicacion[9];  ?>]</p>
                  <br>Asistentes: [<?php echo $publicacion[10];  ?>]</p>
                  <?php
                    }/*Cierra el elseisset*/  ?>

                  <p id="d"> <?php echo $publicacion[3];  ?> </p><br>
                  <p id="l"> <?php echo $publicacion[5];  ?></p>
                  <p id="g"> <?php echo $publicacion[8];  ?> </p>
                 <a href="php/screen_publication.php?id_publication=<?php echo $publicacion[0];  ?>"> mas informacion</a>
                </div>

              </div>
            </div>
            <?php
              }/*cierra el while ($publicacion =mysqli_fetch_row($publicaciones))*/
             }/*Cierra el  if ($estado_publicacion)*/ else{

              ?>
              <p>  No hay publicaciones para mostrar </p>
              <?php
             }
             ?>

           </div>


          </div>

      <!--    <div class="filtros-publicaciones">
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
          </div> -->

        </div> <!-- CIERRA EVENTS -->


        <div class="break">
        </div>

         <!-- ================== MY EVENTS ==================== -->



                   <!-- Sólo los usuarios loggueados podran acceder a Mis eventos -->
                     <?php if(isset($_SESSION['user_name']))  {

                    ?>

        <div class="myEvents">

          <div class="home-text">


            <h2 class="home-text">Mis Eventos</h2>




                 <?php
                 $usuario =$_SESSION['user_name'];
                   $consulta_mis_eventos=" SELECT publicaciones.id_publication , publicaciones.user_name , publicaciones.title , publicaciones.description , publicaciones.text , publicaciones.address , publicaciones.date_initiation , publicaciones.date_end , publicaciones.gender, COUNT( DISTINCT(i.user_name)) AS interesados , COUNT(DISTINCT(a.user_name)) AS asistentes, publicaciones.image FROM publicaciones AS publicaciones
                                          LEFT OUTER JOIN assistants AS a USING(id_publication)
                                          LEFT OUTER JOIN interested AS i USING(id_publication)
                                         WHERE (i.user_name ='$usuario' OR a.user_name = '$usuario') AND  publicaciones.date_initiation> CURDATE()
                                          GROUP BY id_publication";

      /*Traeme*/
      $consulta = mysqli_query($conexion,$consulta_mis_eventos) or die (mysqli_error($conexion));

      $estado_mis_eventos = mysqli_num_rows($consulta);


          if ($estado_mis_eventos>0) {
            ?>
              </div><!-- Cierra Home-text -->
                <div id="slideshow-container">
                <div id="slideshow">
                <?php
          while ($publicacion =mysqli_fetch_row($consulta)) {
                     /* id_publication , user_name , title , description , text , address , date_initiation , date_end , gender, interesados , asistentes*/

                          /*   0                   1        2           3        4       5            6               7          8        9             10 */
            ?>




                  <div id="box1">
                    <div class="MyEventsImg">
                        <img class="img-myEvents" src="<?php echo $publicacion[11];/*6*/  ?> ">
                        <p> <?php echo $publicacion[6];/*6*/  ?> </p>
                    </div>

                    <div class="infoEvent">
                      <h2> <?php echo $publicacion[2]; /*2*/ ?> </h2>
                      <p> <?php echo $publicacion[4];  ?>.</p>
                      <span><a href="php/screen_publication.php?id_publication=<?php echo $publicacion[0];  ?>"> Mas info </a></span>

                    </div>

                  </div>




                 <?php
              }/*cierra el while ($publicacion =mysqli_fetch_row($publicaciones))*/
                        ?>
                        </div>  <!--CIERRA SLIDESHOW -->
                        </div> <!-- CIERRA SLIDESHOW-CONTAINER -->
                        <?php
             }/*Cierra el  if ($estado_publicacion)*/ else{

              ?>
                  <p class="home-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sagittis quam in massa fringilla pulvinar. Ut eget velit et neque feugiat tempor sit amet vitae enim. Aenean mattis felis non eros egestas, at aliquam ligula bibendum. Pellentesque viverra, felis nec lacinia rhoncus, nisi orci pulvinar ante, non accumsan turpis nisl sed sapien </p>

              </div><!-- Cierra Home-text -->

          <div id="slideshow-container">
                <div id="slideshow">
                  <div id="box1">
                    <div class="MyEventsImg">
                        <img src="img/images/jack.jpeg">
                        <p> Agrega publicaciones </p>
                    </div>

                    <div class="infoEvent">
                      <h2> Gil </h2>
                      <p> bobo.</p>
                      <span><a > Mas info Llena la cancha </a></span>

                    </div>

                  </div>

               </div>  <!--CIERRA SLIDESHOW -->
              </div> <!-- CIERRA SLIDESHOW-CONTAINER -->




              <?php
             }
             ?>


              </div>

          <?php
                }/*Cierra el  if(isset($_SESSION['user_name'])) */
           ?>



        <div class="footer">


          <ul>
						<li><a href="php/screen_footer.php">Contacto |</a></li>
						<li><a href="php/screen_footer.php">Sobre Ante Merídiem  |</a></li>
						<li><a href="php/screen_footer.php">Ayuda  |</a></li>
						<li><a href="php/screen_footer.php">Legales  |</a></li>
						<li><a href="php/screen_footer.php">Politica de Privacidad  |</a></li>
						<li><a href="php/screen_footer.php">© Copyright 2017  </a></li>
					</ul>

        </div>


      </div> <!-- CIERRA CONTENIDO-->



      </div> <!-- Cierra MAIN CONTET-->

      <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>
      <script src="js/animation.js"></script>
  </body>

</html>
